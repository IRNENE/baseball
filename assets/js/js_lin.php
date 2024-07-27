<!-- Bootstrap JavaScript Libraries -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


<!-- 預覽圖片 -->
<script>
    function readURL(input) {

        if (input.files && input.files[0]) {

            var imageTagID = input.getAttribute("targetID");

            var reader = new FileReader();

            reader.onload = function(e) {

                var img = document.getElementById(imageTagID);

                img.setAttribute("src", e.target.result)

            }

            reader.readAsDataURL(input.files[0]);

        }

    }
</script>

<!-- ckeditor編輯器 -->
<!-- <script src="../../ckeditor/ckeditor5-build-classic-41.0.0/ckeditor5-build-classic/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script> -->


<!--  -->
<script>
    var selectory = $('#select1').select2({
        width: "100%",
        allowClear: true,
        maximumSelectionLength: 4,
    });
</script>

<!-- 上下複選框同步變化 -->
<script>
    // 獲取上層複選框和下層複選框的元素
    const masterCheckboxes = document.querySelectorAll('.masterCheckbox');
    const childCheckboxes = document.querySelectorAll('.childCheckbox');

    // 監聽上層複選框的變化
    masterCheckboxes.forEach(function(masterCheckbox, index) {
        masterCheckbox.addEventListener('change', function() {
            // 將上層複選框的狀態應用到對應的下層複選框
            childCheckboxes[index].checked = masterCheckbox.checked;
        });
    });

    // 監聽下層複選框的變化
    childCheckboxes.forEach(function(childCheckbox, index) {
        childCheckbox.addEventListener('change', function() {
            // 如果下層複選框被選中，將對應的上層複選框也設為被選中；否則取消選中
            masterCheckboxes[index].checked = childCheckbox.checked;
        });
    });
</script>