<h1>I'm login</h1>

<form action="">
    <p>Name</p>
    <input type="text"><br>
    <p>Pass</p>
    <input type="text"><br>
    <button type="button" id="button_test">Send</button>
    <button type="button" id="button_test2">Send</button>
    <button type="button" id="button_test3">Send</button>
</form>
<?php
    if(!empty($result)) {
        foreach ($result as $value) {
            echo "<p>{$value['job']}</p>";
        }
    }
?>
<div class="results">Ждем ответа</div>

<script>

    const button_test = document.querySelector('#button_test');
    button_test.addEventListener('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'http://11mvc-application/account/test',
            success: function(data) {
                $('.results').html(data);
            }
        });
    });


</script>