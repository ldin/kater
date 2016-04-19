<style>
.b-container{
    width:50%;
    height:150px;
    background-color: #ccc;
    margin:0px auto;
    padding:10px;
    font-size:30px;
    color: #fff;
}
.b-popup{
    width:100%;
    min-height:100%;
    background-color: rgba(0,0,0,0.5);
    overflow:auto;
    position:absolute;
    top:0px;
}
.b-popup .b-popup-content{
    margin:40px auto 0px auto;
    width:80%;
    //height: 40px;
    overflow:auto;
    padding:10px;
    background-color: #c5c5c5;
    border-radius:5px;
    box-shadow: 0px 0px 10px #000;
}
</style>

<div class="b-container">
    Sample Text
    <a href="javascript:PopUpShow()">Show popup</a>
</div>
<div class="b-popup" id="popup1">
    <div class="b-popup-content">
        <p>
            <a href='#'>Позвоните нам <i class="glyphicon glyphicon-earphone"></i></a>
        </p>
        <p>или<br> заполните:</p>
        <form onsubmit="return checkForm();">
            <input name="fio" type="text" placeholder="Имя">
            <input name="fio" type="text" placeholder="Имя">
            <input type="submit" class="btn btn-default" value="Отправить">
        </form>
    <a href="javascript:PopUpHide()">Hide popup</a>
    </div>
</div>

<script>
  $(document).ready(function(){
      PopUpHide();
  });
  function PopUpShow(){
      $("#popup1").show();
  }
  function PopUpHide(){
      $("#popup1").hide();
  }
<script>
