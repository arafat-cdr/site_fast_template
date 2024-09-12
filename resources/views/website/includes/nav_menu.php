<div class="row" style="max-width: 100%;">
    <!-- 1st Column -->
    <div class="col-md-3 order-2 order-md-1">
        <div class="text-white text-center fixed-height d-none d-md-block">
            <a class="navbar-brand" href="<?php echo APP_URL; ?>">
                <img src="<?php echo PUBLIC_URL.'img/website/univerge_logo.png' ?>" 
                     alt="univerge site logo" 
                     title="Site Logo" 
                     class="img-fluid" width='92px'>
                <p style="color: red; font-size: 12px; margin-top: 10px;">
                    An Independent International Academic Publisher
                </p>
            </a>
        </div>
    </div>

    <!-- 2nd Column -->
    <div class="col-md-6 order-3 order-md-2 fixed-height">
        <div class="text-white text-center">
            <img src="<?php echo PUBLIC_URL.'img/website/site_banner.jpg' ?>" 
                 alt="univerge site banner" 
                 title="Site Banner" 
                 class="img-fluids">
        </div>
    </div>

    <!-- 3rd Column -->
    <div class="col-md-3 order-1 order-md-3 fixed-height">
        <div class="p-3 text-white text-center ">
               <a href="<?php echo APP_URL; ?>">
                 <img src="<?php echo PUBLIC_URL.'img/website/universepg-img.jpg' ?>" 
                      alt="univerge site logo" 
                      title="Site Logo" 
                      class="img-fluids d-block d-md-none" style="margin-left: 42px; margin-top: -21px;">
               </a>

            <a href="<?php echo APP_URL.'dashboard' ?>" class="btn btn-light btn-block mb-2">Login</a>
            <a href="<?php echo APP_URL.'register' ?>" class="btn btn-light btn-block mb-2">Register</a>
        </div>
    </div>
</div>



<nav class="navbar navbar-expand-lg" data-bs-theme="dark" style="background: rgb(30 58 138);">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo APP_URL; ?>">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About Us</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo APP_URL.'aim-and-scope'; ?>">Aim and Scope</a>
            <a class="dropdown-item" href="<?php echo APP_URL.'editorial-policy'; ?>">Editorial Policy</a>
            <a class="dropdown-item" href="<?php echo APP_URL.'open-access-policy'; ?>">Open Access Policy</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo APP_URL.'peer-review-policy'; ?>">Peer Review Policy</a>
            <a class="dropdown-item" href="<?php echo APP_URL.'plagiarism-prevention-policy'; ?>">Plagiarism Prevention Policy</a>
            <a class="dropdown-item" href="<?php echo APP_URL.'copyright-and-licensing-policy'; ?>">Copyright and Licensing Policy</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo APP_URL.'conflict-of-interest-disclosure-and-acknowledgement'; ?>">Conflict of Interest Disclosure</a>
            <a class="dropdown-item" href="<?php echo APP_URL.'article-correction-retraction-and-withdrawal-policy'; ?>">Article Correction Retraction and Withdrawal Policy</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL.'journals'; ?>">Journals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL.'abstracting-and-indexing'; ?>">Abstracting and Indexing</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript::void(0)" role="button" aria-haspopup="true" aria-expanded="false">Manuscript Submission</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo APP_URL.'instructions-to-authors'; ?>">Instruction of Authors</a>
            <a class="dropdown-item" href="<?php echo APP_URL.'publication-ethics-and-malpractice-statement'; ?>">Publication Ethics and Malpractice Statement</a>
            <a class="dropdown-item" href="<?php echo APP_URL.'article-processing-charges'; ?>">Article Processing Charges</a>
            <a class="dropdown-item" href="<?php echo APP_URL.'article-template-of-universepg'; ?>">Article Template</a>
            <a class="dropdown-item" href="<?php echo APP_URL.'article-submission'; ?>">Article Submission</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL.'payment'; ?>">Payments</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL.'advisory-board'; ?>">Advisory Board</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo APP_URL.'search'; ?>">Search</a>
        </li>

      </ul>

    </div>
  </div>
</nav>