<!-- Modal Component -->
<div id="confirmModal" class="modal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center">
    <div class="card" style="width:300px;text-align:center">
        <p>آیا مطمئن هستید؟</p>
        <div class="row" style="justify-content:center;margin-top:15px">
            <button class="btn" onclick="closeModal()">انصراف</button>
            <button class="btn btn-danger" id="confirmBtn" style="background:#d33;color:#fff;border-color:#d33">تایید</button>
        </div>
    </div>
</div>

<script>
function showConfirm(form) {
    document.getElementById('confirmModal').style.display = 'flex';
    document.getElementById('confirmBtn').onclick = () => form.submit();
}
function closeModal() {
    document.getElementById('confirmModal').style.display = 'none';
}
</script>
