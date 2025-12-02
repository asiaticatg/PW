            <hr>
        </main> <!-- /container -->

        
        <footer class="container">
            <?php /*objeto para a data (ano no caso ne, aqui ele vai atualizar para o ano certo no copyright)*/ $data = new DateTime("now", new DateTimeZone("America/Sao_Paulo"))?>
            <p>&copy;2025 à <?php echo $data->format("Y") ?>- Felipe Tudela e Sabina Yukari</p>
        </footer>

        <script src="<?php echo BASEURL; ?>js/jquery-3.7.1.min.js"></script>
        <script src="<?php echo BASEURL; ?>js/bootstrap/bootstrap.bundle.min.js"></script>
        <script src="<?php echo BASEURL; ?>js/awesome/all.min.js"></script>
        <script src="<?php echo BASEURL; ?>js/main.js"></script>
    </body>
</html>