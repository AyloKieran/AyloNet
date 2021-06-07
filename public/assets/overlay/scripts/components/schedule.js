let schedule = null
let scheduleData = []
let scheduleShowing = null
let events = []
let eventsProgress = null

function createSchedule() {
    panel = document.getElementById("panel")

    schedule = document.createElement("div")

    if (scheduleData.length >= 1) {
        schedule.setAttribute("id", "schedule")
    } else {
        schedule.setAttribute("id", "schedulehidden")
    }

    sctitle = document.createElement("h4")
    sctitle.setAttribute("id", "scheduletitle")
    sctitle.innerText = "Schedule"

    schedulebox = document.createElement("div")
    schedulebox.setAttribute("id", "schedulebox")

    schedule.appendChild(sctitle)
    schedule.appendChild(schedulebox)


    panel.appendChild(schedule)

    initSchedule()
}

function showSchedule() {
    if (!scheduleShowing) {
        schedule = document.getElementById("schedulehidden")
        schedule.setAttribute("id", "schedule")
        scheduleShowing = true
    }
}

function hideSchedule() {
    if (scheduleShowing) {
        schedule = document.getElementById("schedule")
        schedule.setAttribute("id", "schedulehidden")
        scheduleShowing = false
    }
}

function initSchedule() {
    if (scheduleData.length >= 1) {
        scheduleShowing = true
    } else {
        scheduleShowing = false
    }

    schedule = setInterval(function () {
        getEvents()
    }, 5000)
    getEvents()

    eventsProgress = setInterval(function () {
        updateEventProgress()
    }, 500)

    updateEvents()
}

function getEvents() {
    if (schedule) {
        fetch("https://aylo.net/api/calendar-events")
            .then(function (response) {
                return response.json()
            })
            .then(function (data) {
                if (data != scheduleData) {
                    scheduleData = data
                    // clearEvents()
                    document.getElementById("schedulebox").innerHTML = ''
                    events = []

                    if (scheduleData.length >= 1) {
                        showSchedule()
                        scheduleData.forEach(function (scheduleEvent) {
                            // console.log(scheduleEvent)
                            addEvent(scheduleEvent.id, scheduleEvent.title, scheduleEvent.start, scheduleEvent.end)
                        })
                        updateEventProgress()
                    } else {
                        hideSchedule()
                    }


                }
            })
    }
}

function timeconvert(time) {
    string = new Date(Date.parse(time)).toLocaleTimeString('en-GB', {
        hour: '2-digit',
        minute: '2-digit'
    });
    return string
}

function dynamicSort(property) {
    var sortOrder = 1;
    if (property[0] === "-") {
        sortOrder = -1;
        property = property.substr(1);
    }
    return function (a, b) {
        var result = (a[property] < b[property]) ? -1 : (a[property] > b[property]) ? 1 : 0;
        return result * sortOrder;
    }
}

function updateProgress(eid, percentage) {
    document.getElementById("progress-" + eid).setAttribute("style", "width: " + percentage + "%")
}

function totalTime(start, end) {
    var total = new Date(start) - new Date(end)
    return total / 1000
}

function timeDiff(end) {
    var timeDiff = new Date(end) - new Date()
    return timeDiff / 1000
}

function getPercent(start, end) {
    total = totalTime(start, end)
    diff = timeDiff(end)
    remain = diff / total
    percent = (((remain * 100 * -1) - 100) * -1).toFixed(2)
    if (percent < 0) {
        percent = 0
    }
    return percent
}

// function clearEvents() {
//     // events = []
//     document.getElementById("schedulebox").innerHTML = ''
// }

function addEvent(eid, etitle, estart, eend) {
    eevent = {
        id: eid,
        title: etitle,
        start: estart,
        end: eend
    }

    events.push(eevent)

    updateEvents()

    showSchedule()
}

function removeEvent(eid) {
    events.splice(events.findIndex(function (i) {
        return i.id === eid;
    }), 1);

    document.getElementById("event-" + eid).remove()

    if (events.length < 1) {
        hideSchedule()
    }
}

function updateEvents() {
    // events = []
    document.getElementById("schedulebox").innerHTML = ''

    events.sort(dynamicSort("end"))

    for (eevent in events) {
        eevent = events[eevent]
        createEvent(eevent.id, eevent.title, timeconvert(eevent.start), timeconvert(eevent.end))
    }

    createDone()

    if (events.length < 1) {
        hideSchedule()
    }
}

function updateEventProgress() {
    if (schedule) {
        for (eevent in events) {
            eevent = events[eevent]
            progress = document.getElementById("progress-" + eevent.id)
            progress.setAttribute("style", "width: " + getPercent(eevent.start, eevent.end) + "%")

            if (getPercent(eevent.start, eevent.end) > 100) {
                removeEvent(eevent.id)
            }
        }
    }
}

function createDone(fillertext = "") {
    schedulebox = document.getElementById("schedulebox")

    schedulefiller = document.createElement("div")
    schedulefiller.setAttribute("id", "schedulefiller")

    schedulefillertext = document.createElement("h3")
    schedulefillertext.setAttribute("id", "schedulefillertext")
    schedulefillertext.innerText = fillertext

    schedulefiller.appendChild(schedulefillertext)

    schedulebox.appendChild(schedulefiller)
}

function createEvent(eid, etitle, estart, eend) {
    schedulebox = document.getElementById("schedulebox")

    etable = document.createElement("table")
    etable.setAttribute("class", "event")
    etable.setAttribute("id", "event-" + eid)

    tr1 = document.createElement("tr")
    td1 = document.createElement("td")
    td1.setAttribute("colspan", "2")

    eventtitle = document.createElement("div")
    eventtitle.setAttribute("class", "eventtitle")
    eventtitle.innerText = etitle

    td1.appendChild(eventtitle)

    tr1.appendChild(td1)

    tr2 = document.createElement("tr")
    td2 = document.createElement("td")

    eventstart = document.createElement("div")
    eventstart.setAttribute("class", "eventstart")
    eventstart.innerText = estart

    td2.appendChild(eventstart)

    td3 = document.createElement("td")

    eventend = document.createElement("div")
    eventend.setAttribute("class", "eventend")
    eventend.innerText = eend

    td3.appendChild(eventend)

    tr2.appendChild(td2)
    tr2.appendChild(td3)

    tr3 = document.createElement("tr")
    td4 = document.createElement("td")
    td4.setAttribute("colspan", "2")

    progressbarholder = document.createElement("div")
    progressbarholder.setAttribute("class", "progressbarholder")

    progressbar = document.createElement("div")
    progressbar.setAttribute("class", "progressbar")
    progressbar.setAttribute("id", "progress-" + eid)
    progressbar.setAttribute("style", "width: 0%")

    progressbarholder.appendChild(progressbar)

    td4.appendChild(progressbarholder)

    tr3.appendChild(td4)

    etable.appendChild(tr1)
    etable.appendChild(tr2)
    etable.appendChild(tr3)

    schedulebox.appendChild(etable)
}
