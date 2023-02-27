const calendar = document.querySelector("#calendar");
const monthYear = document.querySelector("#month-year");
const calendarDatesBody = document.querySelector("#calendar-dates-body");
const prevMonthBtn = document.querySelector("#prev-month-btn");
const nextMonthBtn = document.querySelector("#next-month-btn");

let date = new Date();
let year = date.getFullYear();
let month = date.getMonth();

  const months = [
    "Janvier",
    "Février",
    "Mars",
    "Avril",
    "Mai",
    "Juin",
    "Juillet",
    "Août",
    "Septembre",
    "Octobre",
    "Novembre",
    "Décembre"
  ];
  
  const getDaysInMonth = (year, month) => {
    return new Date(year, month + 1, 0).getDate();
  };
  
  const getFirstDayOfMonth = (year, month) => {
    return new Date(year, month, 1).getDay();
  };
  
  const generateCalendar = (year, month) => {
    let daysInMonth = getDaysInMonth(year, month);
    let firstDayOfMonth = getFirstDayOfMonth(year, month);
  
    monthYear.textContent = `${months[month]} ${year}`;
  
    let calendarHTML = "";
    let day = 1;
  
    for (let i = 0; i < 6; i++) {
      calendarHTML += "<tr>";
  
      for (let j = 0; j < 7; j++) {
        if (i === 0 && j < firstDayOfMonth) {
          calendarHTML += "<td></td>";
        } else if (day <= daysInMonth) {
          calendarHTML += `<td class="date">${day}</td>`;
          day++;
        } else {
          calendarHTML += "<td></td>";
        }
      }
  
      calendarHTML += "</tr>";
    }
  
    calendarDatesBody.innerHTML = calendarHTML;
  };
  
  generateCalendar(year, month);
  
  prevMonthBtn.addEventListener("click", () => {
    if (month === 0) {
      year--;
      month = 11;
    } else {
      month--;
    }
  
    generateCalendar(year, month);
  });
  
  nextMonthBtn.addEventListener("click", () => {
    if (month === 11) {
      year++;
      month = 0;
    } else {
      month++;
    }
  
    generateCalendar(year, month);
  });
  
  const dates = document.querySelectorAll(".date");

dates.forEach(date => {
  let dateText = date.textContent;

  if (reservedDates.includes(dateText)) {
    date.style.backgroundColor = "red";
  }
});
