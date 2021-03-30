$('.editbtn').on('click',function (){
        $tr=$(this).closest('tr');
        var datos=$tr.children("td").map(function(){
          return $(this).text();
        });
        $('#update_id').val(datos[0]);
        $('#exampleInputNombre2').val(datos[1]);
        $('#exampleInputApellidos2').val(datos[2]);
        $('#exampleInputNivel2').val(datos[3]);
        $('#exampleInputEmail2').val(datos[4]);
        $('#exampleInputLogin2').val(datos[5]);
        $('#exampleInputEstado2').val(datos[6]);
      });