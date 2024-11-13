</div>
      <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/jquery-3.7.1.min.js"></script>
      <script>
      </script>
      <script>
        $(document).ready(function(){
          $("#email").change(function(){
            var data = $(this).val();
            var data2send = {"email":data};
            $.get("process/validate_email.php",data2send, function(rsp){
              $('#email_feedback').html(rsp);
              $('#email_feedback').addClass('text-info');
              if(rsp == "Email has been taken"){
                $('#btnsub').attr('disabled', 'disabled')
              }else{
                $('#btnsub').removeAttr('disabled')
              }
           
            }); 
          });
        });
      </script>
</body>
</html>