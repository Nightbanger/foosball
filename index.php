<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php include("html/headcontent.html")?>

<body>

<!-- Navigation --><?php include("html/navigation.html")?>

<!-- Header -->
<!-- Header -->
<header id="top" class="header">
    <div class="text-vertical-center">
        <h1>KEA Foosball</h1>

        <h3>Claim the top of the highscore!</h3>
        <br>
        <a href="<?php if (isset($_SESSION['loginfailure']) && $_SESSION['loginfailure']) {
            echo 'html/loginfail-modal.html';
        } else echo 'html/login-modal.html'; ?>"
           id="loginWindow" class="btn btn-light btn-lg" data-toggle="modal"
           data-target="#logModal">Login</a>
        <a href="html/register-modal.html" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#regModal">Register</a>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="logModal" tabindex="-1" role="dialog" aria-labelledby="logModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Register Modal -->
    <div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="regModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

</header>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <h4><strong>KEA Foosball</strong>
                </h4>

                <p>K&oslash;benhavn NV<br>Lygten, 37 & 16</p>
                <ul class="list-unstyled">
                    <!--<li><i class="fa fa-phone fa-fw"></i> (123) 456-7890</li>-->
                    <!--<li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">name@example.com</a>-->
                    </li>
                </ul>
                <br>
                <ul class="list-inline">
                    <li>
                        <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                    </li>
                </ul>
                <!--<hr class="small">
                <p class="text-muted">Copyright &copy; Your Website 2014</p>-->
            </div>
        </div>
    </div>
</footer>

<script type='text/javascript'>
    var loginWindow = document.getElementById('loginWindow');
    <?php if (isset($_SESSION['loginfailure'])&&$_SESSION['loginfailure']){ $_SESSION['loginfailure']=false; echo 'loginWindow.click();';}?>
</script>


</body>

</html>
