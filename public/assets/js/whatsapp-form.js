/* Express Nadimi — send form submissions to WhatsApp.
 *
 * Every <form data-whatsapp-form="inquiry|contact"> is checked in the browser and, instead of
 * being posted to the server, opens WhatsApp with a ready-to-send message for our number.
 * Forms without the attribute (for example the supplier form) are not touched.
 */
(() => {
    'use strict';

    /* ---------- Settings ---------- */
    const WHATSAPP_NUMBER = '989144172605'; // international format, digits only
    const MAX_ENCODED_LENGTH = 6000;        // keeps the wa.me link safely below URL length limits
    const MIN_PHONE_DIGITS = 6;

    const $ = (selector, root = document) => root.querySelector(selector);
    const $$ = (selector, root = document) => [...root.querySelectorAll(selector)];
    const html = document.documentElement;
    const lang = ['fa', 'ar'].includes(html.lang) ? html.lang : 'en';
    const reduceMotion = matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------- Form definitions ----------
     * required: fields that must be filled in
     * groups:   fields of the message, in order; each group is separated by a blank line
     * note:     the free-text field, always placed last (it is shortened if the link gets too long)
     * Email and phone are validated together: at least one of them is required.
     */
    const FORMS = {
        inquiry: {
            required: ['quantity', 'destination', 'name'],
            groups: [['product', 'quantity', 'packaging', 'incoterm', 'destination'], ['name', 'company', 'email', 'phone'],],
            note: 'message',
        }, contact: {
            required: ['name', 'body'],
            groups: [['type', 'office'], ['name', 'subject', 'email', 'phone', 'order_ref'],],
            note: 'body',
        },
    };

    const CONTACT_FIELDS = ['email', 'phone'];

    /* ---------- Texts ---------- */
    const TEXT = {
        fa: {
            intro: {
                inquiry: 'سلام، از طریق وب‌سایت اکسپرس ندیمی درخواست استعلام قیمت دارم:',
                contact: 'سلام، از طریق فرم «تماس با ما» در وب‌سایت اکسپرس ندیمی پیام می‌فرستم:',
            }, labels: {
                product: 'محصول',
                quantity: 'مقدار',
                packaging: 'بسته‌بندی',
                incoterm: 'شرایط تحویل (Incoterm)',
                destination: 'کشور / بندر مقصد',
                name: 'نام',
                company: 'شرکت',
                email: 'ایمیل',
                phone: 'تلفن / واتساپ',
                message: 'توضیحات',
                type: 'نوع پیام',
                office: 'ارسال به',
                subject: 'موضوع',
                order_ref: 'شماره سفارش یا فاکتور',
                body: 'متن پیام',
            }, errors: {
                required: 'این فیلد الزامی است.',
                contact: 'ایمیل یا تلفن را وارد کنید (یکی از آن‌ها الزامی است).',
                email: 'ایمیل واردشده معتبر نیست.',
                phone: 'شماره تلفن واردشده معتبر نیست.',
            }, notice: {
                opened: 'پیام شما در واتساپ آماده شد؛ برای ارسال، دکمه ارسال را در واتساپ بزنید.',
                truncated: 'متن پیام طولانی بود و کوتاه شد؛ بقیه را می‌توانید در واتساپ اضافه کنید.',
                fallback: 'اگر واتساپ باز نشد، اینجا بزنید.',
            },
        }, en: {
            intro: {
                inquiry: 'Hello, I would like to request a quote through the Express Nadimi website:',
                contact: 'Hello, I am writing to you through the contact form on the Express Nadimi website:',
            }, labels: {
                product: 'Product',
                quantity: 'Quantity',
                packaging: 'Packaging',
                incoterm: 'Delivery terms (Incoterm)',
                destination: 'Destination country / port',
                name: 'Name',
                company: 'Company',
                email: 'Email',
                phone: 'Phone / WhatsApp',
                message: 'Notes',
                type: 'Message type',
                office: 'Send to',
                subject: 'Subject',
                order_ref: 'Order or invoice number',
                body: 'Message',
            }, errors: {
                required: 'This field is required.',
                contact: 'Enter an email address or a phone number (one of them is required).',
                email: 'Enter a valid email address.',
                phone: 'Enter a valid phone number.',
            }, notice: {
                opened: 'Your message is ready in WhatsApp. Press send there to deliver it.',
                truncated: 'Your message was long and has been shortened. You can add the rest in WhatsApp.',
                fallback: 'If WhatsApp did not open, click here.',
            },
        }, ar: {
            intro: {
                inquiry: 'مرحباً، أرغب في طلب عرض سعر عبر موقع إكسبرس نديمي:',
                contact: 'مرحباً، أراسلكم عبر نموذج «اتصل بنا» في موقع إكسبرس نديمي:',
            }, labels: {
                product: 'المنتج',
                quantity: 'الكمية',
                packaging: 'التعبئة',
                incoterm: 'شرط التسليم (Incoterm)',
                destination: 'بلد / ميناء الوجهة',
                name: 'الاسم',
                company: 'الشركة',
                email: 'البريد الإلكتروني',
                phone: 'الهاتف / واتساب',
                message: 'ملاحظات',
                type: 'نوع الرسالة',
                office: 'إرسال إلى',
                subject: 'الموضوع',
                order_ref: 'رقم الطلب أو الفاتورة',
                body: 'نص الرسالة',
            }, errors: {
                required: 'هذا الحقل مطلوب.',
                contact: 'أدخل البريد الإلكتروني أو رقم الهاتف (أحدهما مطلوب).',
                email: 'أدخل بريداً إلكترونياً صالحاً.',
                phone: 'أدخل رقم هاتف صالحاً.',
            }, notice: {
                opened: 'رسالتك جاهزة في واتساب. اضغط زر الإرسال هناك لإتمام الإرسال.',
                truncated: 'كانت رسالتك طويلة فتم اختصارها. يمكنك إضافة الباقي في واتساب.',
                fallback: 'إذا لم يفتح واتساب، اضغط هنا.',
            },
        },
    };
    const t = TEXT[lang];
    const extraText = {
        fa: {add: 'افزودن محصول دیگر', remove: 'حذف'},
        en: {add: 'Add another product', remove: 'Remove'},
        ar: {add: 'إضافة منتج آخر', remove: 'إزالة'},
    }[lang];

    /* ---------- Reading the form ---------- */
    const normalizeDigits = (value) => value
        .replace(/[۰-۹]/g, (d) => String(d.charCodeAt(0) - 1776))
        .replace(/[٠-٩]/g, (d) => String(d.charCodeAt(0) - 1632));

    const controlOf = (form, name) => form.elements.namedItem(name);

    /* The value as the visitor sees it: option text for selects, label text for radios. */
    const valueOf = (form, name) => {
        const control = controlOf(form, name);
        if (!control) return '';
        const el = control instanceof RadioNodeList ? [...control].find((radio) => radio.checked) : control;
        if (!el || el.closest('[hidden]')) return '';

        if (el.tagName === 'SELECT') return el.selectedOptions[0]?.textContent.trim() ?? '';
        if (el.type === 'radio') {
            const label = el.closest('label');
            return (label?.querySelector('b') || label?.querySelector('span'))?.textContent.trim() ?? el.value;
        }
        return el.value.trim();
    };

    /* ---------- Validation ---------- */
    const validate = (form, kind) => {
        const problems = [];
        const add = (names, message) => problems.push({names, message});

        FORMS[kind].required.forEach((name) => {
            if (!valueOf(form, name)) add([name], t.errors.required);
        });

        const email = valueOf(form, 'email');
        const phone = valueOf(form, 'phone');

        if (kind === 'contact') {
            // The contact endpoint requires both an email address and a phone number.
            if (!email) add(['email'], t.errors.required);
            if (!phone) add(['phone'], t.errors.required);
        } else if (!email && !phone) {
            add(CONTACT_FIELDS, t.errors.contact);
        }

        // When the visitor adds extra products, the first product also becomes
        // mandatory, and every extra row needs a product and a quantity.
        if (kind === 'inquiry') {
            const extras = $$('[data-extra-row]', form);

            if (extras.length) {
                if (!valueOf(form, 'product')) add(['product'], t.errors.required);

                extras.forEach((row) => {
                    const product = $('[data-extra-product]', row);
                    const quantity = $('[data-extra-quantity]', row);

                    if (product && !product.value) add([product.name], t.errors.required);
                    if (quantity && !quantity.value.trim()) add([quantity.name], t.errors.required);
                });
            }
        }

        const emailControl = controlOf(form, 'email');
        const phoneControl = controlOf(form, 'phone');

        if (email && emailControl && emailControl.validity.typeMismatch) {
            add(['email'], t.errors.email);
        }

        if (phone && normalizeDigits(phone).replace(/\D/g, '').length < MIN_PHONE_DIGITS) {
            add(['phone'], t.errors.phone);
        }

        return problems;
    };

    const showProblem = (form, {names, message}) => {
        names.forEach((name) => {
            const el = controlOf(form, name);
            if (!el) return;
            el.closest('.field')?.classList.add('bad');
            el.setAttribute('aria-invalid', 'true');
        });

        const first = controlOf(form, names[0]);
        if (!first) return null;

        const text = document.createElement('p');
        text.className = 'err';
        if (first.id) {
            text.id = `${first.id}-error`;
        }
        text.dataset.whatsappError = '';
        text.textContent = message;

        const wrapper = first.closest('.field') || first.parentElement;
        if (wrapper) wrapper.append(text);

        if (text.id) first.setAttribute('aria-describedby', text.id);
        return first;
    };

    const clearProblems = (form) => {
        $$('[data-whatsapp-error]', form).forEach((text) => text.remove());
        $$('.field.bad', form).forEach((field) => field.classList.remove('bad'));
        $$('[aria-invalid]', form).forEach((el) => {
            el.removeAttribute('aria-invalid');
            el.removeAttribute('aria-describedby');
        });
    };

    /* Editing a field removes its error message (email and phone share one message). */
    const clearProblemsOf = (form, el) => {
        const controls = CONTACT_FIELDS.includes(el.name) ? CONTACT_FIELDS.map((name) => controlOf(form, name)) : [el];
        controls.forEach((control) => {
            const field = control.closest('.field');
            if (!field) return;
            field.classList.remove('bad');
            $$('[data-whatsapp-error]', field).forEach((text) => text.remove());
            control.removeAttribute('aria-invalid');
            control.removeAttribute('aria-describedby');
        });
    };

    /* ---------- Message ---------- */
    const selectedText = (el) => {
        if (!el) return '';
        if (el.tagName === 'SELECT') return el.selectedOptions[0]?.textContent.trim() ?? '';
        return el.value.trim();
    };

    const extraItems = (form) => $$('[data-extra-row]', form).map((row) => ({
        product: selectedText($('[data-extra-product]', row)),
        quantity: selectedText($('[data-extra-quantity]', row)),
        packaging: $('[data-extra-packaging]', row)?.value ? selectedText($('[data-extra-packaging]', row)) : '',
    }));

    const buildMessage = (form, kind, note) => {
        const {groups, note: noteName} = FORMS[kind];
        const lines = [t.intro[kind], ''];

        const extras = kind === 'inquiry' ? extraItems(form) : [];

        if (extras.length) {
            const first = {
                product: selectedText($('select[name="product"]', form)),
                quantity: selectedText($('input[name="quantity"]', form)),
                packaging: $('select[name="packaging"]', form)?.value ? selectedText($('select[name="packaging"]', form)) : '',
            };

            [first, ...extras].forEach((item, index) => {
                lines.push(`${index + 1}. ${t.labels.product}: ${item.product} — ${t.labels.quantity}: ${item.quantity}` + (item.packaging ? ` — ${t.labels.packaging}: ${item.packaging}` : ''));
            });
            lines.push('');

            groups.forEach((group) => {
                const rows = group
                    .filter((name) => !['product', 'quantity', 'packaging'].includes(name))
                    .map((name) => ({name, value: valueOf(form, name)}))
                    .filter(({value}) => value)
                    .map(({name, value}) => `*${t.labels[name]}:* ${value}`);
                if (rows.length) lines.push(...rows, '');
            });
        } else {
            groups.forEach((group) => {
                const rows = group
                    .map((name) => ({name, value: valueOf(form, name)}))
                    .filter(({value}) => value)
                    .map(({name, value}) => `*${t.labels[name]}:* ${value}`);
                if (rows.length) lines.push(...rows, '');
            });
        }

        if (note) lines.push(`*${t.labels[noteName]}:*`, note);
        return lines.join('\n').trim();
    };

    /* Builds the wa.me link. If it would be too long, only the free-text note is shortened. */
    const buildLink = (form, kind) => {
        const characters = [...valueOf(form, FORMS[kind].note)]; // code points, so emoji are never split
        let kept = characters.length;
        let text = buildMessage(form, kind, characters.join(''));

        while (encodeURIComponent(text).length > MAX_ENCODED_LENGTH && kept > 0) {
            kept = Math.floor(kept * 0.9);
            text = buildMessage(form, kind, `${characters.slice(0, kept).join('')}…`);
        }

        return {
            url: `https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(text)}`,
            truncated: kept < characters.length,
        };
    };

    /* ---------- Opening WhatsApp ---------- */
    const openWhatsApp = (url) => {
        const link = document.createElement('a');
        link.href = url;
        link.target = '_blank';
        link.rel = 'noopener noreferrer';
        document.body.append(link);
        link.click();
        link.remove();
    };

    /* Confirmation under the form, with a link in case the browser blocked the new tab. */
    const showNotice = (form, url, truncated) => {
        let box = $('[data-whatsapp-notice]', form);
        if (!box) {
            box = document.createElement('div');
            box.className = 'notice notice-ok w';
            box.dataset.whatsappNotice = '';
            box.setAttribute('role', 'status');
            box.innerHTML = '<svg class="ic" aria-hidden="true"><use href="#i-whatsapp"></use></svg><p></p>';
            const foot = $('.iform-foot', form);
            if (foot) foot.before(box); else form.append(box);
        }

        const text = $('p', box);
        text.textContent = `${t.notice.opened} ${truncated ? `${t.notice.truncated} ` : ''}`;

        const link = document.createElement('a');
        link.href = url;
        link.target = '_blank';
        link.rel = 'noopener noreferrer';
        link.textContent = t.notice.fallback;
        text.append(link);
    };

    /* Shows a server-side validation message that could not be attached to a field. */
    const showServerError = (form, message) => {
        let box = $('[data-whatsapp-server-error]', form);
        if (!box) {
            box = document.createElement('p');
            box.className = 'notice notice-bad w';
            box.dataset.whatsappServerError = '';
            box.setAttribute('role', 'alert');
            const foot = $('.iform-foot', form);
            if (foot) foot.before(box); else form.append(box);
        }
        box.textContent = message;
        box.scrollIntoView({block: 'center', behavior: reduceMotion ? 'auto' : 'smooth'});
    };

    /* ---------- Persisting to the server ---------- */
    const persist = async (form) => {
        const body = new FormData(form);

        // The first product uses the simple product/quantity/packaging fields.
        // When extra rows exist the endpoint expects every product in the
        // products[] array, so mirror the first product into products[0].
        if ($$('[data-extra-row]', form).length) {
            const summary = ['product', 'quantity', 'packaging'];
            const selectors = {
                product: 'select[name="product"]',
                quantity: 'input[name="quantity"]',
                packaging: 'select[name="packaging"]',
            };

            summary.forEach((name) => {
                const control = $(selectors[name], form);
                body.append(`products[0][${name}]`, control ? control.value : '');
            });
        }

        const response = await fetch(form.action, {
            method: 'POST', body, credentials: 'same-origin', headers: {
                'X-Requested-With': 'XMLHttpRequest', Accept: 'application/json',
            },
        });

        if (response.status === 422) {
            const payload = await response.json().catch(() => null);
            const errors = payload && payload.errors ? Object.values(payload.errors) : [];
            return {
                ok: false, message: errors.length ? [].concat(errors[0])[0] : null,
            };
        }

        return {ok: response.ok, message: null};
    };

    /* ---------- Multiple products ---------- */
    const setupInquiryRepeater = (form) => {
        const grid = $('.iform-grid', form);
        const baseProduct = $('select[name="product"]', form);
        const baseQuantity = $('input[name="quantity"]', form);
        const basePackaging = $('select[name="packaging"]', form);

        if (!grid || !baseProduct || !baseQuantity || !basePackaging) return;

        const box = document.createElement('div');
        box.className = 'field w';
        box.style.gridColumn = '1 / -1';

        const list = document.createElement('div');
        list.dataset.extraRows = '';
        list.style.display = 'grid';
        list.style.gap = '10px';

        const add = document.createElement('button');
        add.type = 'button';
        add.className = 'btn';
        add.style.marginTop = '10px';
        add.textContent = extraText.add;

        let index = 1;

        add.addEventListener('click', () => {
            const row = document.createElement('div');
            row.dataset.extraRow = '';
            row.style.display = 'grid';
            row.style.gridTemplateColumns = 'minmax(0,1fr) minmax(0,1fr) minmax(0,1fr) auto';
            row.style.gap = '8px';
            row.style.alignItems = 'end';

            const product = baseProduct.cloneNode(true);
            product.name = `products[${index}][product]`;
            product.removeAttribute('id');
            product.value = '';
            product.required = true;
            product.dataset.extraProduct = '';
            product.setAttribute('aria-label', t.labels.product);

            const quantity = baseQuantity.cloneNode(true);
            quantity.name = `products[${index}][quantity]`;
            quantity.removeAttribute('id');
            quantity.value = '';
            quantity.required = true;
            quantity.dataset.extraQuantity = '';
            quantity.setAttribute('aria-label', t.labels.quantity);

            const packaging = basePackaging.cloneNode(true);
            packaging.name = `products[${index}][packaging]`;
            packaging.removeAttribute('id');
            packaging.value = '';
            packaging.dataset.extraPackaging = '';
            packaging.setAttribute('aria-label', t.labels.packaging);

            const remove = document.createElement('button');
            remove.type = 'button';
            remove.className = 'btn';
            remove.textContent = '×';
            remove.title = extraText.remove;
            remove.setAttribute('aria-label', extraText.remove);
            remove.addEventListener('click', () => {
                row.remove();
                if (!list.children.length) {
                    box.style.display = 'none';
                }
            });

            row.append(product, quantity, packaging, remove);
            list.append(row);
            index += 1;
            box.style.display = '';
        });

        box.append(list, add);
        grid.append(box);
    };

    /* ---------- Wiring ---------- */
    const initForm = (form) => {
        const kind = form.dataset.whatsappForm;
        if (!FORMS[kind]) return;
        const submitButton = $('[type="submit"]', form);

        if (kind === 'inquiry') {
            setupInquiryRepeater(form);
        }

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            clearProblems(form);
            $$('[data-whatsapp-server-error]', form).forEach((node) => node.remove());

            const problems = validate(form, kind);
            if (problems.length) {
                const firstField = problems.map((problem) => showProblem(form, problem)).find(Boolean);
                if (firstField) {
                    firstField.scrollIntoView({block: 'center', behavior: reduceMotion ? 'auto' : 'smooth'});
                    firstField.focus({preventScroll: true});
                }
                return;
            }

            const {url, truncated} = buildLink(form, kind);

            // Reserve the tab synchronously so the browser does not block it while
            // the request is in flight; it is redirected to WhatsApp on success.
            const pendingTab = window.open('', '_blank');

            if (submitButton) submitButton.disabled = true;

            let result = {ok: true, message: null};
            try {
                result = await persist(form);
            } catch (error) {
                // The network failed, but the visitor can still reach us on WhatsApp.
                result = {ok: true, message: null};
            } finally {
                if (submitButton) submitButton.disabled = false;
            }

            if (!result.ok) {
                if (pendingTab) pendingTab.close();
                showServerError(form, result.message || t.errors.required);
                return;
            }

            if (pendingTab && !pendingTab.closed) {
                pendingTab.location.href = url;
            } else {
                openWhatsApp(url);
            }

            showNotice(form, url, truncated);
        });

        ['input', 'change'].forEach((type) => {
            form.addEventListener(type, (event) => clearProblemsOf(form, event.target));
        });
    };

    $$('form[data-whatsapp-form]').forEach(initForm);
})();
