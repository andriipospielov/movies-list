<link rel="stylesheet" href="/css/style_input_form.css">
<div id="forms">
    <form action="/movie/lookup/" method="post">

        <label for="film">Search: </label>
        <input name="searchstr" type="text" id="title"><br>

        <label for="format">Look in:</label>
        <select name="searchtype" id="format">

            <option value="m">movies</option>
            <option value="a">actors</option>
        </select>
        <div class="button">

            <button type="submit">Submit</button>
        </div>
    </form>

</div>