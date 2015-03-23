<!-- Fichier : /app/View/Tournaments/view.ctp -->

<h1><?php echo h($tournament['Tournament']['title']); ?></h1>

<p><small>Crיי le : <?php echo $tournament['Tournament']['created']; ?></small></p>

<p><?php echo h($tournament['Tournament']['body']); ?></p>