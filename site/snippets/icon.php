<?php
$type = $type ?? 'default';

$icons = [
  'bleu' => '📘',
  'saumon' => '📕',
  'violet' => '📙',
  'menthe' => '✅',
  'framboise' => '💬',
  'acier' => '📖',
  'default' => '📄',
];

echo $icons[$type] ?? $icons['default'];
?>
