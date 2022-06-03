
<?php
if (isset($_POST['fio']))
{
//здесь прописываем код обработки формы
$str_out =$_POST['fio'] ;
$str_out=mb_strtoupper ($str_out, 'UTF-8');
echo $str_out;
}
?>


          
      
        <script type="text/javascript">
          $('.table-ord').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
            }
          });
        </script>
