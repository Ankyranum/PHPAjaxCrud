
<?php include 'header.php';?>
    <div class="jumbotron" style="width: 850px; margin: auto; box-shadow: 10px 10px 8px #888888;">
        <div class="row">
            <div class="col-md5 mx-auto">
                <form action="" method="post" id="form">
                    <div id="result"></div>
                    <div class="form-group">
                        <label for="">Cihaz</label><br>
                        <input type="text" id="title" class="form-group">
                    </div>
                    <div class="form-group">
                        <label for="">Arızası</label>
                        <textarea name="descrption" id="descrption" cols="50" rows="2" class="form-control">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit" class="btn btn-outline-primary"><i class="fas fa-share"></i> Ekle</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-1">
                <div id="show"></div>
                <div id="fetch"></div>
            </div>
        </div>
    </div>
    <!-- Modal READ-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kayıt Görüntüleniyor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="read_data"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Çık</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal EDİT -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Düzenle</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="edit_data"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
            <button type="button" class="btn btn-primary" id="update">Kaydet</button>
          </div>
        </div>
      </div>
    </div>
    <?php include 'footer.php';?>
</body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
        $(document).on("click","#submit", function(e){
            e.preventDefault();
            
            var title = $("#title").val();
            var descrption = $("#descrption").val();
            var submit = $("#submit").val();

            $.ajax({
                url:"insert.php",
                type:"post",
                data:{
                    title:title,
                    descrption:descrption,
                    submit:submit
                },
                success: function(data){
                    fetch();
                    $("#result").html(data); 
                }
            });

            $("#form")[0].reset();
        });

        //Fetch kayıtları.

        function fetch(){
            $.ajax({
                url:"fetch.php",
                type:"post",
                success: function(data){
                    $("#fetch").html(data);
                }
            });
        }
        fetch();

        //Silme İşlemi

        $(document).on("click","#del", function(e){
            e.preventDefault();

            if (window.confirm("Silmek istediğinize emin misiniz?")) {

            var del_id = $(this).attr("value");

                $.ajax({
                    url:"del.php",
                    type: "post",
                    data:{
                        del_id:del_id
                    },
                    success: function(data){
                        fetch();
                        $("#show").html(data);  
                    }
                });
            }else{
                return false;
            }
        });

        //Görüntüleme İşlemi

        $(document).on("click","#read", function(e){
            e.preventDefault();

            var read_id = $(this).attr("value");

            $.ajax({
                url:"read.php",
                type: "post",
                data:{
                    read_id:read_id
                },
                success: function(data){
                    
                    $("#read_data").html(data);  
                }
            });
        });

        //Düzenleme işlemi için veri çekme.

        $(document).on("click","#edit", function(e){
            e.preventDefault();

            var edit_id = $(this).attr("value");

            $.ajax({
                url:"edit.php",
                type: "post",
                data:{
                    edit_id:edit_id
                },
                success: function(data){
                    
                    $("#edit_data").html(data);  
                }
            });
        });

        //Düzenleme işlemi

        $(document).on("click","#update", function(e){
            e.preventDefault();

            var edit_title = $("#edit_title").val();
            var edit_descrption = $("#edit_descrption").val();
            var update = $("#update").val();
            var edit_id = $("#edit_id").val();

            $.ajax({
                url:"update.php",
                type: "post",
                data:{
                    edit_id:edit_id,
                    edit_title:edit_title,
                    edit_descrption:edit_descrption,
                    update:update

                },
                success: function(data){
                    fetch();
                    $("#show").html(data);  
                }
            });
            
        });
    </script>
  </body>
</html>