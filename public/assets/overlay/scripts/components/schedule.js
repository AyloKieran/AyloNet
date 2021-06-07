let schedule = null
let scheduleData = {}
let scheduleShowing = null

function createSchedule() {
    panel = document.getElementById("panel")

    schedule = document.createElement("div")
    schedule.setAttribute("id", "schedulehidden")

    sctitle = document.createElement("h4")
    sctitle.setAttribute("id", "scheduletitle")
    sctitle.innerText = "Schedule"

    schedulebox = document.createElement("div")
    schedulebox.setAttribute("id", "schedulebox")
    // schedulebox.setAttribute("src", "./schedule.html")

    schedule.appendChild(sctitle)
    schedule.appendChild(schedulebox)


    panel.appendChild(schedule)

    initSchedule()
}

function showSchedule() {
    if(!scheduleShowing) {
        schedule = document.getElementById("schedulehidden")
        schedule.setAttribute("id", "schedule")
        scheduleShowing = true
    }
}

function hideSchedule() {
    if(scheduleShowing) {
        schedule = document.getElementById("schedule")
        schedule.setAttribute("id", "schedulehidden")
        scheduleShowing = false
    }
}

function initSchedule() {
    scheduleShowing = false
    showSchedule()
}