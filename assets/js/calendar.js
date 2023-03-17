/*<div id="buscafecha">
<form action="#" name="buscar">
  <p>Selecionar 
    <select name="buscames">
      <option value="0">Enero</option>
      <option value="1">Febrero</option>
      <option value="2">Marzo</option>
      <option value="3">Abril</option>
      <option value="4">Mayo</option>
      <option value="5">Junio</option>
      <option value="6">Julio</option>
      <option value="7">Agosto</option>
      <option value="8">Septiembre</option>
      <option value="9">Octubre</option>
      <option value="10">Noviembre</option>
      <option value="11">Diciembre</option>
    </select>
    <input type="text" name="buscaanno" maxlength="4" size="4" />
    <input  type="button" value="BUSCAR" onclick="mifecha()" />
  </p>
</form>
</div>
<div id="anterior" onclick="mesantes()"></div>
<div id="posterior" onclick="mesdespues()"></div>
<h2 id="titulos"></h2>
<table id="diasc">
<tr id="fila0"><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
<tr id="fila1"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr id="fila2"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr id="fila3"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr id="fila4"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr id="fila5"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr id="fila6"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
</table>
<div id="fechaactual"><i onclick="actualizar()">HOY: </i></div>
</div>

function calendario() {
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes();
    var dateTime = date+' '+time;
    $("#form_datetime").datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        autoclose: true,
        todayBtn: true,
        startDate: dateTime
    });
}*/
$(document).ready(function(){

    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        startDate: '0d'
    });
    
    $('.cell').click(function(){
        $('.cell').removeClass('select');
        $(this).addClass('select');
    });
    
    });