/**
 * 
 */
 var Countdown = function (options, date) {
   let targetDate = countdown.dataset.target
    this.options = {
      $elem: options.$elem || undefined,
      elemSelector: options.elemSelector || 'data-countdown',
      startDate: options.startDate || new Date(),
      endDate: options.endDate || new Date(targetDate),
      leadingZero: options.leadingZero !== undefined ? options.leadingZero : true,
      setCssProperties: options.setCssProperties !== undefined ? options.setCssProperties : true,
      separateDigits: options.separateDigits !== undefined ? options.separateDigits : true,
      nextDigits: options.nextDigits !== undefined ? options.nextDigits : true,
      labelTimes: options.labelTimes || {
        days: "Days",
        hours: "Hours",
        minutes: "Minutes",
        seconds: "Seconds",
      },
      arialabelTimes: options.arialabelTimes || {
        time: "%days, %hours, %minutes, and %seconds remaining",
        days: {
          zero: "%d days",
          single: "%d day",
          plural: "%d days",
        },
        hours: {
          zero: "%d hours",
          single: "%d hour",
          plural: "%d hours"
        },
        minutes: {
          zero: "%d minutes",
          single: "%d minute",
          plural: "%d minutes",
        },
        seconds: {
          zero: "%d seconds",
          single: "%d second",
          plural: "%d seconds",
        },
      }
    };
    
    // Initialise
    this.$elem = this.options.$elem || document.querySelector(options.elemSelector);
    this.startDate = new Date(this.options.startDate);
    this.endDate = new Date(this.options.endDate);
    this.ticker = 0;
    this.$elem.querySelector('.days .labelTime').innerText = this.options.labelTimes.days;
    this.$elem.querySelector('.hours .labelTime').innerText = this.options.labelTimes.hours;
    this.$elem.querySelector('.minutes .labelTime').innerText = this.options.labelTimes.minutes;
    this.$elem.querySelector('.seconds .labelTime').innerText = this.options.labelTimes.seconds;
    
    // Start ticker
    this.update();
    this.run();
  }
  
  Countdown.prototype.getlabelTime = function (labelTimeSet, labelTimeName, value) {
    if (["labelTimes", "arialabelTimes"].indexOf(labelTimeSet) === -1) {
      throw new Error("Invalid labelTimeSet given: must be labelTimes or arialabelTimes");
    }
    if (["days", "hours", "minutes", "seconds"].indexOf(labelTimeName) === -1) {
      throw new Error("Invalid labelTimeName given: must be days, hours, minutes or seconds");
    }
    var valueQuant = value === 0 ? "zero" : value === 1 ? "single" : "plural";
    return this.options[labelTimeSet][labelTimeName][valueQuant].replace("%d", value);
  }
  
  Countdown.prototype.leadingZero = function (value, length) {
    if (this.options.leadingZero && String(value).length < length) {
      var padLength = length - String(value).length;
      var output = String(value);
      for (var i=0; i < padLength; i++) {
        output = '0' + output;
      }
      return output;
    }
    return value;
  }
  
  Countdown.prototype.separateDigits = function (value) {
    if (this.options.separateDigits && String(value).length) {
      var _value = String(value).split("");
      var output = '';
      for (var i=(_value.length - 1); i >= 0 ; i--) {
        var digit = parseInt(_value[i], 10);
        output = '<span class="digit digit-' + Math.pow(10, _value.length - 1 - i) + '"' +
          (this.options.nextDigits
            ? ' data-countdown-next-digit="' + ((digit + 1) % 10) + '"'
            : '') +
          '>' + digit + '</span>' + output;
      }
      return output;
    } else {
      return value;
    }
  }
  
  Countdown.prototype.update = function () {
    var now = new Date();
    
    var diffSeconds = Math.floor((this.endDate.getTime() - now.getTime()) / 1000);
    var diffMinutes = Math.floor(diffSeconds / 60);
    var diffHours = Math.floor(diffSeconds / 3600);
    var diffDays = Math.floor(diffSeconds / 86400);
    
    var days = 0;
    var hours = 0;
    var minutes = 0;
    var seconds = 0;
    
    if (this.startDate <= now && this.endDate > now) {
      seconds = diffSeconds % 60;
      minutes = diffMinutes % 60;
      hours = diffHours % 24;
      days = diffDays;
    }
    
    // Update title/aria labelTime
    var arialabelTime = this.options.arialabelTimes.time
      .replace("%days", this.getlabelTime("arialabelTimes", "days", days))
      .replace("%hours", this.getlabelTime("arialabelTimes", "hours", hours))
      .replace("%minutes", this.getlabelTime("arialabelTimes", "minutes", minutes))
      .replace("%seconds", this.getlabelTime("arialabelTimes", "seconds", seconds));
    this.$elem.setAttribute("title", arialabelTime);
    this.$elem.setAttribute("aria-labelTime", arialabelTime);
    
    // Update visible amounts
    this.$elem.querySelector('.seconds .amount').innerHTML = this.separateDigits(this.leadingZero(seconds, 2));
    this.$elem.querySelector('.minutes .amount').innerHTML = this.separateDigits(this.leadingZero(minutes, 2));
    this.$elem.querySelector('.hours .amount').innerHTML = this.separateDigits(this.leadingZero(hours, 2));
    this.$elem.querySelector('.days .amount').innerHTML = this.separateDigits(this.leadingZero(days, 2));
    
    // Next digits
    if (this.options.nextDigits) {
      this.$elem.querySelector('.seconds .amount')
        .setAttribute('data-countdown-next-digits', (seconds + 1) % 60);
      this.$elem.querySelector('.minutes .amount')
        .setAttribute('data-countdown-next-digits', (minutes + 1) % 60);
      this.$elem.querySelector('.hours .amount')
        .setAttribute('data-countdown-next-digits', (hours + 1) % 24);
      this.$elem.querySelector('.days .amount')
        .setAttribute('data-countdown-next-digits', days + 1);
    }
    
    // Update CSS properties
    if (this.options.setCssProperties) {
      var maxDiffSeconds = Math.floor((this.endDate.getTime() - this.startDate.getTime()) / 1000);
      var maxDiffMinutes = Math.floor(maxDiffSeconds / 60);
      var maxDiffHours = Math.floor(maxDiffSeconds / 3600);
      var maxDiffDays = Math.floor(maxDiffSeconds / 86400);
      
      this.$elem.style.setProperty("--countdown-percent", maxDiffSeconds > 0
        ? diffSeconds / maxDiffSeconds : 0);
      this.$elem.style.setProperty("--countdown-percent-seconds", maxDiffSeconds > 0
        ? diffSeconds / maxDiffSeconds : 0);
      this.$elem.style.setProperty("--countdown-percent-minutes", maxDiffMinutes > 0
        ? diffMinutes / maxDiffMinutes : 0);
      this.$elem.style.setProperty("--countdown-percent-hours", maxDiffHours > 0
        ? diffHours / maxDiffHours : 0);
      this.$elem.style.setProperty("--countdown-percent-days", maxDiffDays > 0
        ? diffDays / maxDiffDays : 0);
    }
  }
  
  Countdown.prototype.run = function () {
    var self = this;
    var now = new Date();
    
    self.update();
    
    if (now < this.endDate) {
      self.ticker = setTimeout(function () {
        self.run()
      }, 1000);
    } else {
      clearTimeout(self.ticker);
      self.$elem.setAttribute('data-countdown-ended', true);
    }
  }
  
  /**
   * Initialise countdowns on HTML elements
   */
  var countdowns = document.querySelectorAll('[data-countdown]');
  if (countdowns.length > 0) {
    for (var i=0; i < countdowns.length; i++) {
      var leadingZero = countdowns[i].getAttribute('data-countdown-option-leadingzero');
      var setCssProperties = countdowns[i].getAttribute('data-countdown-option-setcssproperties');
      var separateDigits = countdowns[i].getAttribute('data-countdown-option-separatedigits');
      var nextDigits = countdowns[i].getAttribute('data-countdown-option-nextdigits');
      
      leadingZero = leadingZero === true ||
        leadingZero === "true" ||
        leadingZero === "1" ||
        leadingZero === 1
        ? true
        : false;
      
      setCssProperties = setCssProperties === true ||
        setCssProperties === "true" ||
        setCssProperties === "1" ||
        setCssProperties === 1
        ? true
        : false;
      
      separateDigits = separateDigits === true ||
        separateDigits === "true" ||
        separateDigits === "1" ||
        separateDigits === 1
        ? true
        : false;
      
      nextDigits = nextDigits === true ||
        nextDigits === "true" ||
        nextDigits === "1" ||
        nextDigits === 1
        ? true
        : false;
      
      new Countdown({
        $elem: countdowns[i],
        startDate: countdowns[i].getAttribute('data-countdown-option-startdate'),
        endDate: countdowns[i].getAttribute('data-countdown'),
        leadingZero: leadingZero,
        setCssProperties: setCssProperties,
        separateDigits: separateDigits,
        nextDigits: nextDigits,
      });
    }
  }