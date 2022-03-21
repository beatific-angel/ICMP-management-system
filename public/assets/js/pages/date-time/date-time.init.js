$(document).ready(function () {
  flatpickr("#date", {
    dateFormat: "d-m-Y",
    allowInput: true,
    onOpen: function (selectedDates, dateStr, instance) {
      instance.setDate(instance.input.value, false);
    },
  });

  flatpickr("#date1", {
    dateFormat: "d-m-Y",
    allowInput: true,
    onOpen: function (selectedDates, dateStr, instance) {
      instance.setDate(instance.input.value, false);
    },
  });

  flatpickr("#datetime", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    onOpen: function (selectedDates, dateStr, instance) {
      instance.setDate(instance.input.value, false);
    },
  });

  flatpickr("#dateOfBirth", {
    dateFormat: "d-m-Y",
    allowInput: true,
    onOpen: function (selectedDates, dateStr, instance) {
      instance.setDate(instance.input.value, false);
    },
  });

  flatpickr("#therapyDate", {
    dateFormat: "d-m-Y",
    allowInput: true,
    onOpen: function (selectedDates, dateStr, instance) {
      instance.setDate(instance.input.value, false);
    },
  });

  if (document.getElementById("dateIcon")) {
    const nativeElement = document.getElementById("dateIcon");

    flatpickr(nativeElement, {
      dateFormat: "d-m-Y",
      allowInput: true,
      wrap: true,
    });
  }

  if (document.getElementById("dateIcon2")) {
    const nativeElement = document.getElementById("dateIcon2");

    flatpickr(nativeElement, {
      dateFormat: "d-m-Y",
      allowInput: true,
      wrap: true,
    });
  }

  flatpickr("#time", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    onOpen: function (selectedDates, dateStr, instance) {
      instance.setDate(instance.input.value, false);
    },
  });
  flatpickr("#multiselectdate", {
    mode: "multiple",
    dateFormat: "Y-m-d",
    onOpen: function (selectedDates, dateStr, instance) {
      instance.setDate(instance.input.value, false);
    },
  });
  flatpickr("#daterange", {
    mode: "range",
    onOpen: function (selectedDates, dateStr, instance) {
      instance.setDate(instance.input.value, false);
    },
  });
});
