<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success text-center">Vous êtes connecté !</div>
<?php endif ?>

<?php if (isset($_GET['success_register'])): ?>
    <div class="alert alert-success text-center">Inscription validée ! <a href="/my-first-blog/login">Se connecter</a></div>
<?php endif ?>

<?php if (isset($_GET['success_mail'])): ?>
  <div class="alert alert-success text-center">Votre message a bien été envoyé.</div>
<?php endif ?>

  <!-- Section présentation -->
  <section class="text-center py-5">
    <div class="container">
      <img src="/my-first-blog/public/img/kb.png" alt="Photo de Profil" class="rounded-circle mb-4" style="width: 150px; height: 150px;">
      <h1>Kayden Bartholomot</h1>
      <p class="lead">Le PHP n'a plus aucun secret pour moi !</p>
    </div>
  </section>

  <!-- Section à propos -->
  <section class="bg-primary bg-opacity-25 py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2>À propos</h2>
          <p>Passionné par l’innovation et les défis techniques, je me suis spécialisé dans le développement d’applications web avec le parcours OpenClassrooms PHP/Symfony.</p>
        </div>
        <div class="col-md-6">
          <p>J’ai de l’expertise en conception de solutions performantes et sécurisées, intégration d’API, et optimisation des bases de données. Expérience confirmée dans des projets Agile, je mets un point d’honneur sur la qualité du code et la satisfaction utilisateur. </p>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="/my-first-blog/posts" class="btn btn-secondary">
            Découvrir les articles
        </a>
        <a href="/my-first-blog/public/pdf/CV_bartholomot_kayden.pdf" download="CV_bartholomot_kayden.pdf" class="btn btn-primary">
            Télécharger mon CV
        </a>
      </div>
    </div>
  </section>

  <!-- Section formulaire de contact -->
  <section class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Me contacter</h2>
      <form action="/my-first-blog/send" method="POST">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Votre nom d'utilisateur" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="email" class="form-label">Adresse e-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Votre adresse e-mail" required>
          </div>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Message</label>
          <textarea class="form-control" id="message" name="message" rows="4" placeholder="Votre message" required></textarea>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <p>Suivez-moi sur :</p>
        <a href="https://github.com/kayuden" class="text-white mx-2" target="_blank"><img src="/my-first-blog/public/img/github-brands-solid.svg" alt="Icône GitHub" width="30"></a>
        <a href="https://www.linkedin.com/in/kayden-bartholomot/" class="text-white mx-2" target="_blank"><img src="/my-first-blog/public/img/linkedin-brands-solid.svg" alt="Icône LinkedIn" width="30"></a>
        <a href="https://x.com" class="text-white mx-2" target="_blank"><img src="/my-first-blog/public/img/x-twitter-brands-solid.svg" alt="Icône X" width="30"></a>
        <a href="https://www.instagram.com" class="text-white mx-2" target="_blank"><img src="/my-first-blog/public/img/instagram-brands-solid.svg" alt="Icône Instagram" width="30"></a>
        <a href="https://www.facebook.com" class="text-white mx-2" target="_blank"><img src="/my-first-blog/public/img/facebook-brands-solid.svg" alt="Icône Facebook" width="30"></a>
    </div>
  </footer>
  <section class="bg-black text-white text-center py-2">
    <small>&copy; Mon Premier Blog 2024</small>
  </section>
