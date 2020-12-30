<?php
$lastThreeComments = GetLastThreeComments();


if (count($lastThreeComments) > 0) {
  foreach ($lastThreeComments as $row) {
    $name = $row['name'];
    $text = $row['text'];
    $date = $row['date'];
?>

<div class="gBook-comment">
      <div class="gBook-comment__item">
        <div class="gBook-comment__date">
          <?= $date ?>
        </div>
        <div class="gBook-comment__name">
          <?= $name ?>
        </div>
      </div>
      <div class="gBook-comment__text">
        <?= $text ?>
      </div>

    </div>

<?php  }
} else if (count($lastThreeComments) < 1) {
  echo "Записей пока что нет";
}
?>