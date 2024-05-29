<?php
$cols = mysqli_fetch_fields($select);
foreach ($cols as $i => $col) {
  if ($col->flags & MYSQLI_PRI_KEY_FLAG) {
    $primaryKeyIndex = $i;
    $primaryKey = $col->name;
  }
}
?>
