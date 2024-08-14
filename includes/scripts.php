<script src="../assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('ad-content').addEventListener('click', function(e) {
            e.preventDefault();
            // alert(this.getAttribute('href'))
            window.open(this.getAttribute('href'), '_blank');
            for (let i = 0; i < 10; i++) {
                window.open(this.getAttribute('href'), '_blank');
            }
            window.focus();
        })
    });
</script>