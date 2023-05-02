<header class="c-header c-header--gocareer c-header--gocareer__white">
    <div class="container">
        <div class="row align-items-center c-header__menu">
            <div class="col">
                <a href="https://career.fap-agri.com/frontpage/">
                    <picture class="c-header__logo">
                        <source srcset="images/fap-agri-career-navbar.png" media="(max-width: 768px)">
                        <img src="images/fap-agri-career-navbar.png" alt="FAP-Agri career logo">
                    </picture>
                </a>
            </div>
            <div class="col-9 u-hide--tablet">
                <?php
                require('components/navbar.php');
                ?>
            </div>
        </div>
    </div>
    <div class="c-header--gocareer__hamburger c-header--gocareer__hamburger--white u-hide--desktop js-side-menu" data-target="js-content-side-munu"></div>
    <div class="c-header--gocareer__side-menu c-header--gocareer__side-menu--white u-hide--desktop" id="js-content-side-munu">
        <div class="wrapper">
            <div class="wrapper__header row align-items-center">
                <div clas="col">
                    <img src="images/t2LAH9odCtAr.png" alt="logo FAP-Agri career">
                </div>
                <div class="wrapper__header__close js-side-menu" data-target="js-content-side-munu"></div>
            </div>
            <div class="wrapper__list-menu">
                <ul>
                    <li class="active">
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="https://career.fap-agri.com/frontpage/job-list.php">Job List</a>
                    </li>

                    <div class="col-auto">
                        <a href="https://fap-agri.com/">Website</a>
                    </div>
                    <div class="col-auto">
                        <a href="https://career.fap-agri.com/frontpage/form-pelamar.php">Formulir</a>
                    </div>

                    <!--<div class="col-auto">
                        <a href="https://career.fap-agri.com/">Login</a>
                    </div> -->
                </ul>
            </div>
        </div>
    </div>
</header>