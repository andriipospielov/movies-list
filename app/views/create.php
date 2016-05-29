<link rel="stylesheet" href="/css/style_input_form.css">
<div id="forms">
    <form action="/movie/store/type/movie" method = "post">
        <label for="film">Title: </label>
        <input name="title" type="text" id="title"><br>

        <label for="year">Year:</label>
        <input name="year" type="text" id="year"><br>

        <label for="format">Format:</label>
        <select name="format" id="format" >

            <?foreach ($data['formats'] as $format):?>
            <option value="<?echo $format['id']?>"><?echo $format['name']?></option>
            <?endforeach;?>            
        </select>

        <br>
        <label for="actor">Actors: </label>
        <select name="actors[]" id="actor" multiple="multiple">

            <?foreach ($data['actors'] as $actor):?>
                <option value="<?echo $actor['id']?>"><?echo $actor['name']?></option>
            <?endforeach;?>

        </select>
        <br>
        (Hold down the Ctrl button to select multiple options)

        <div class="button">

            <button type="submit">Submit</button>
        </div>
    </form>

    <form action="/movie/store/type/format" method = "post">
        <label for="newFormat">New format: </label>
        <input type="text" id="newFormat" name="newFormat"><br>
        <div class="button">
            <button type="submit">Submit</button>
        </div>
    </form>
    
    <form action="/movie/store/type/actor" method = "post">
        <label for="newActor">New Actor: </label>
        <input type="text" id="newActor" name="newActor"><br>
        <div class="button">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>