<style>
    .adminButton {
        border: none;
        text-decoration: underline;
        color: dodgerblue;
    }
</style>

<h1>This is an admin panel</h1>
<ul>
    <li>
        <button onclick="deleteUsers()" class="adminButton">Delete all Users</button>
    </li>
    <li>
        <button onclick="clearProtocol()" class="adminButton">Clear Protocol</button>
    </li>
    <li>
        <button onclick="deleteMeasurements()" class="adminButton">Delete all Measurements</button>
    </li>
</ul>
<br>