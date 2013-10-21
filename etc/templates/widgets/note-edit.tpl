<section class="note-edit">
    <form action="{{ urlFor('saveNote') }}" method="post">
        <fieldset>
            <legend>Edit note</legend>
            <label for="note-title">Title</label><br>
            <input type="text" id="note-title" name="title"><br>
            <label for="note-text">Text</label><br>
            <textarea id="note-text" name="text" cols="48" rows="16"></textarea><br>
            <input type="submit" value="Save">
        </fieldset>
    </form>
</section>
