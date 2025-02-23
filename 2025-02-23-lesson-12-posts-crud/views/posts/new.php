<h1>Create new post</h1>

<form action="/?module=posts&action=create" method="POST">

    <div>
        <label>
            Title
            <input type="text" name="title">
        </label>
    </div>

    <div>
        <label>
            Content
            <textarea name="content"></textarea>
        </label>
    </div>

    <button type="submit">Create post</button>

</form>