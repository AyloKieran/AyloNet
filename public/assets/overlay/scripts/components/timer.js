let timerupdater = null

function createTime() {
    timer = true
    
    timerUpdater()

    panel = document.getElementById("panel")

    timebox = document.createElement("div")
    timebox.setAttribute("id", "timebox")

    tbt = document.createElement("h2")
    tbt.setAttribute("id", "timeboxtime")
    tbt.innerText = " Loading "

    tbd = document.createElement("h3")
    tbd.setAttribute("id", "timeboxdate")
    tbd.innerText = " Loading "

    timebox.appendChild(tbt)
    timebox.appendChild(tbd)

    panel.appendChild(timebox)

    updateTimebox()
}

function updateTimebox() {
    var time = new Date().toLocaleTimeString('en-GB');
    var date = new Date().toLocaleDateString('en-GB', {weekday: 'long', day: '2-digit', month: 'long', year: 'numeric'});
    document.getElementById("timeboxtime").innerHTML = time;
    document.getElementById("timeboxdate").innerHTML = date;
}

function timerUpdater() {
    timerupdater = setInterval(function() {
        updateTimebox()
    }, 1000)
}