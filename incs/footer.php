<footer>
  <div class="bloco">
    <div class="container d-flex justify-content-evenly align-items-center">
      <div>
        <p class="m-0 neon" id="email">EmailExample@gmail.com.br</p>
        <div class="traco"></div>
      </div>
      <div class="d-flex justify-content-start mt-3">
        <ul>
          <li><a href="" class="navegacaoLinkIconeFooter"><i class="fa-brands fa-twitter"></i></a></li>
          <li><a href="" class="navegacaoLinkIconeFooter"><i class="fa-brands fa-facebook"></i></a></li>
        </ul>
        <ul>
          <li><a href="" class="navegacaoLinkIconeFooter"><i class="fa-brands fa-youtube"></i></a></li>
          <li><a href="" class="navegacaoLinkIconeFooter"><i id="payPal" class="fa-brands fa-paypal"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<script src="../js/reveal.js"></script>
<script src="../js/sideNav.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
  function mostraImagem(img) {
    if (img.files && img.files[0]) {
      var reader = new FileReader();
      var imagem = document.getElementById("imgImage");
      reader.onload = function(e) {
        imagem.src = e.target.result;
      };

      reader.readAsDataURL(img.files[0]);
    }
  }

  function abre() {
    $('.lbox').css('display', 'block');
  }

  function fecha() {
    $('.lbox').css('display', 'none');
  }

  async function loading() {
    $('#load').css('left', '-100%');
  }

  function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min;
    //O numero máximo é excluído getRandomInt(0,100) pode mostrar de 0 até 99
  }

  let num = getRandomInt(1, 4);

  if (num == 1) {
    $('footer').css('backgroundImage', 'url("../img/veadoBebeAqua.gif")');
  }
  if (num == 2) {
    $('footer').css('backgroundImage', 'url("../img/gatoChuva.gif")')
  }
  if (num == 3) {
    $('footer').css('backgroundImage', 'url("../img/chuva.gif")')
  }
</script>
</body>

</html>