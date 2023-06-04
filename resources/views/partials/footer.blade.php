</body>

<!--   Core JS Files   -->
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="/assets/js/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="/assets/js/demo.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function () {
    $('#example').DataTable();
  });

  async function changeValue(){
    var selectElement = document.getElementById("id_barang");
    var kode_barang = document.getElementById('kode_barang');
    var id = selectElement.value;

    try {
      const response = await fetch(`http://127.0.0.1:8000/api/get-kode-barang/${id}`);
      if (!response.ok) {

        console.log("error")
      }
      const data = await response.json();
      document.getElementById('kode_barang').value = data.kode_barang;
   
    } catch (error) {
      // Handle any errors that occurred during the API request
      console.error('Error:', error);
    }

  }
</script>

</html>