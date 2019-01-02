<h1>I'm register</h1>
<form action="#">
    <p>Name</p>
    <input type="text"><br>
    <p>email</p>
    <input type="text"><br>
    <p>Pass</p>
    <input type="text"><br>
    <button id="send">Send</button>
</form>
<div class="results">Ждем ответа</div>

<script>

    const button_test = document.querySelector('#send');
    button_test.addEventListener('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'http://11mvc-application/account/register',
            success: function(data) {
                $('.results').html(data);
            }
        });
    });


</script>