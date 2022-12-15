<?php
$str="";
$array= [];

$file=fopen("data/todo.txt","r");
flock($file,LOCK_EX);

if($file){
  while($line=fgets($file)){
    $str .= "<tr><td>{$line}</td></tr>";

    $array [] = [
      "date" => explode (" ", $line)[0],
      "company" => explode (" ", $line)[1],
      "q1" => explode (" ", $line)[2],
      "q2" => explode (" ", $line)[3],
      "q3" => explode (" ", $line)[4],
      "q4" => explode (" ", $line)[5],
      "q5" => explode (" ", $line)[6],
      "q6" => explode (" ", $line)[7],
      "q7" => explode (" ", $line)[8],
      "q8" => explode (" ", $line)[9],
      "ploblems" => explode (" ", $line)[10],
      "request" => str_replace("\n", "",explode (" ", $line)[11]),
    ];

  }
}
flock($file,LOCK_UN);
fclose($file);

// var_dump($array);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>textファイル書き込み型todoリスト（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>アンケート履歴</legend>
    <a href="todo_txt_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>アンケート一覧</th>
        </tr>
      </thead>
      <tbody>
         <?=$str?>
      </tbody>
    </table>
  </fieldset>
  <p></p>
  <script>
    const todos = <?=json_encode($array)?>;
    console.log(todos.q1);
  </script>
</body>

</html>