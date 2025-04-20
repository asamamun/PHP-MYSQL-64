<?php
$string = 'The quick brown fox jumped over the lazy dog. another quick brown fox';
$string = preg_replace('/quick/', 'super-fast', $string);
echo $string;
?>
<hr>
<?php
$string = 'Hello 123 world 456';
$word = "/hello/";
$result = preg_replace($word, '######', $string);
echo $result;
?>
<hr>
<?php
$lorem = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta temporibus reprehenderit repudiandae, voluptatem repellat asperiores consectetur eius quisquam placeat voluptate quidem facilis illo? Aliquid facere ut velit voluptates omnis minima!
Natus, hic architecto labore blanditiis quidem alias porro eaque ipsa ab nostrum perferendis nobis incidunt omnis iure ut recusandae assumenda fugiat, perspiciatis tenetur quaerat. Vel excepturi at recusandae eum delectus?
Ullam aliquid, voluptas quisquam magni laborum minima sunt molestias error accusantium numquam consectetur repellendus perferendis a, dolorem dolorum aspernatur expedita culpa odio laboriosam. Maiores itaque sunt eligendi a excepturi nostrum.
Mollitia corrupti quo impedit asperiores quasi repudiandae ullam voluptatibus reprehenderit expedita ratione, architecto suscipit, debitis quia, eius cum rem facere esse! Quos, alias. Impedit maxime laudantium inventore, iusto vel officiis.";
$badwords = ['/lorem/i', '/velit/i', '/error/i'];
$lorem = preg_replace($badwords, "*****", $lorem);
echo $lorem;
?>
