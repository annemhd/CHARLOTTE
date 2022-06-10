        <style>
            [x-cloak] {
                display: none;
            }
        </style>
        <div class="flex items-center">
            <legend class="px-3">du</legend>
            <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                <div class="w-full mb-2">
                    <label for="datepicker"></label>
                    <div class="relative">
                        <input type="hidden" name="date_debut" x-ref="date" :value="datepickerValue" class="" />
                        <input type="text" x-on:click="showDatepicker = !showDatepicker" x-model="datepickerValue" x-on:keydown.escape="showDatepicker = false" class="w-full pl-9 py-1.5 rounded-lg focus:outline-none text-slate-600 bg-slate-200" placeholder="Select date" readonly />

                        <div class="absolute top-0 left-0 px-3 py-2">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 7.33301H4.66667V8.66634H6V7.33301ZM8.66667 7.33301H7.33333V8.66634H8.66667V7.33301ZM11.3333 7.33301H10V8.66634H11.3333V7.33301ZM12.6667 2.66634H12V1.33301H10.6667V2.66634H5.33333V1.33301H4V2.66634H3.33333C2.59333 2.66634 2.00667 3.26634 2.00667 3.99967L2 13.333C2 14.0663 2.59333 14.6663 3.33333 14.6663H12.6667C13.4 14.6663 14 14.0663 14 13.333V3.99967C14 3.26634 13.4 2.66634 12.6667 2.66634ZM12.6667 13.333H3.33333V5.99967H12.6667V13.333Z" fill="#334155" />
                            </svg>

                        </div>

                        <div class="bg-white mt-10 rounded-lg shadow p-4 absolute top-0 left-0 z-50" style="width: 17rem" x-show.transition="showDatepicker" @click.away="showDatepicker = false">
                            <div class="flex justify-between items-center mb-2">
                                <div>
                                    <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                    <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                </div>
                                <div>
                                    <button type="button" class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full" @click="if (month == 0) {
												year--;
												month = 12;
											} month--; getNoOfDays()">
                                        <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </button>
                                    <button type="button" class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full" @click="if (month == 11) {
												month = 0; 
												year++;
											} else {
												month++; 
											} getNoOfDays()">
                                        <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="flex flex-wrap mb-3 -mx-1">
                                <template x-for="(day, index) in DAYS" :key="index">
                                    <div style="width: 14.26%" class="px-0.5">
                                        <div x-text="day" class="text-gray-800 font-medium text-center text-xs"></div>
                                    </div>
                                </template>
                            </div>

                            <div class="flex flex-wrap -mx-1">
                                <template x-for="blankday in blankdays">
                                    <div style="width: 14.28%" class="text-center border p-1 border-transparent text-sm"></div>
                                </template>
                                <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                    <div style="width: 14.28%" class="px-1 mb-1">
                                        <div @click="getDateValue(date)" x-text="date" class="cursor-pointer text-center text-sm leading-none rounded-md leading-loose transition ease-in-out duration-100" :class="{
                      'bg-blue-200': isToday(date) == true, 
                      'text-gray-600 hover:bg-blue-200': isToday(date) == false && isSelectedDate(date) == false,
                      'bg-blue-500 text-white hover:bg-opacity-75': isSelectedDate(date) == true 
                    }"></div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>








            <legend class="px-3">au</legend>
            <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                <div class="w-full mb-2">
                    <label for="datepicker"></label>
                    <div class="relative">
                        <input type="hidden" name="date_fin" x-ref="date" :value="datepickerValue" class="" />
                        <input type="text" x-on:click="showDatepicker = !showDatepicker" x-model="datepickerValue" x-on:keydown.escape="showDatepicker = false" class="w-full pl-9 py-1.5 rounded-lg focus:outline-none text-slate-600 bg-slate-200" placeholder="Select date" readonly />

                        <div class="absolute top-0 left-0 px-3 py-2">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 7.33301H4.66667V8.66634H6V7.33301ZM8.66667 7.33301H7.33333V8.66634H8.66667V7.33301ZM11.3333 7.33301H10V8.66634H11.3333V7.33301ZM12.6667 2.66634H12V1.33301H10.6667V2.66634H5.33333V1.33301H4V2.66634H3.33333C2.59333 2.66634 2.00667 3.26634 2.00667 3.99967L2 13.333C2 14.0663 2.59333 14.6663 3.33333 14.6663H12.6667C13.4 14.6663 14 14.0663 14 13.333V3.99967C14 3.26634 13.4 2.66634 12.6667 2.66634ZM12.6667 13.333H3.33333V5.99967H12.6667V13.333Z" fill="#334155" />
                            </svg>

                        </div>

                        <div class="bg-white mt-10 rounded-lg shadow p-4 absolute top-0 left-0 z-50" style="width: 17rem" x-show.transition="showDatepicker" @click.away="showDatepicker = false">
                            <div class="flex justify-between items-center mb-2">
                                <div>
                                    <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                    <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                </div>
                                <div>
                                    <button type="button" class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full" @click="if (month == 0) {
												year--;
												month = 12;
											} month--; getNoOfDays()">
                                        <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </button>
                                    <button type="button" class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full" @click="if (month == 11) {
												month = 0; 
												year++;
											} else {
												month++; 
											} getNoOfDays()">
                                        <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="flex flex-wrap mb-3 -mx-1">
                                <template x-for="(day, index) in DAYS" :key="index">
                                    <div style="width: 14.26%" class="px-0.5">
                                        <div x-text="day" class="text-gray-800 font-medium text-center text-xs"></div>
                                    </div>
                                </template>
                            </div>

                            <div class="flex flex-wrap -mx-1">
                                <template x-for="blankday in blankdays">
                                    <div style="width: 14.28%" class="text-center border p-1 border-transparent text-sm"></div>
                                </template>
                                <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                    <div style="width: 14.28%" class="px-1 mb-1">
                                        <div @click="getDateValue(date)" x-text="date" class="cursor-pointer text-center text-sm leading-none rounded-md leading-loose transition ease-in-out duration-100" :class="{
                      'bg-blue-200': isToday(date) == true, 
                      'text-gray-600 hover:bg-blue-200': isToday(date) == false && isSelectedDate(date) == false,
                      'bg-blue-500 text-white hover:bg-opacity-75': isSelectedDate(date) == true 
                    }"></div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const MONTH_NAMES = [
                "Janvier",
                "Février",
                "Mars",
                "Avril",
                "Mars",
                "Juin",
                "Juillet",
                "Août",
                "Septembre",
                "Octobre",
                "Novembre",
                "Decembre",
            ];
            const MONTH_SHORT_NAMES = [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ];
            const DAYS = ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"];

            function app() {
                return {
                    showDatepicker: false,
                    datepickerValue: "",
                    selectedDate: "2024-07-26",
                    dateFormat: "YYYY-MM-DD",
                    month: "",
                    year: "",
                    no_of_days: [],
                    blankdays: [],
                    initDate() {
                        let today;
                        if (this.selectedDate) {
                            today = new Date(Date.parse(this.selectedDate));
                        } else {
                            today = new Date();
                        }
                        this.month = today.getMonth();
                        this.year = today.getFullYear();
                        this.datepickerValue = this.formatDateForDisplay(
                            today
                        );
                    },
                    formatDateForDisplay(date) {
                        let formattedDay = DAYS[date.getDay()];
                        let formattedDate = ("0" + date.getDate()).slice(
                            -2
                        ); // appends 0 (zero) in single digit date
                        let formattedMonth = MONTH_NAMES[date.getMonth()];
                        let formattedMonthShortName =
                            MONTH_SHORT_NAMES[date.getMonth()];
                        let formattedMonthInNumber = (
                            "0" +
                            (parseInt(date.getMonth()) + 1)
                        ).slice(-2);
                        let formattedYear = date.getFullYear();
                        if (this.dateFormat === "DD-MM-YYYY") {
                            return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`; // 02-04-2021
                        }
                        if (this.dateFormat === "YYYY-MM-DD") {
                            return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`; // 2021-04-02
                        }
                        if (this.dateFormat === "D d M, Y") {
                            return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`; // Tue 02 Mar 2021
                        }
                        return `${formattedDay} ${formattedDate} ${formattedMonth} ${formattedYear}`;
                    },
                    isSelectedDate(date) {
                        const d = new Date(this.year, this.month, date);
                        return this.datepickerValue ===
                            this.formatDateForDisplay(d) ?
                            true :
                            false;
                    },
                    isToday(date) {
                        const today = new Date();
                        const d = new Date(this.year, this.month, date);
                        return today.toDateString() === d.toDateString() ?
                            true :
                            false;
                    },
                    getDateValue(date) {
                        let selectedDate = new Date(
                            this.year,
                            this.month,
                            date
                        );
                        this.datepickerValue = this.formatDateForDisplay(
                            selectedDate
                        );
                        // this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + formattedMonthInNumber).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);
                        this.isSelectedDate(date);
                        this.showDatepicker = false;
                    },
                    getNoOfDays() {
                        let daysInMonth = new Date(
                            this.year,
                            this.month + 1,
                            0
                        ).getDate();
                        // find where to start calendar day of week
                        let dayOfWeek = new Date(
                            this.year,
                            this.month
                        ).getDay();
                        let blankdaysArray = [];
                        for (var i = 1; i <= dayOfWeek; i++) {
                            blankdaysArray.push(i);
                        }
                        let daysArray = [];
                        for (var i = 1; i <= daysInMonth; i++) {
                            daysArray.push(i);
                        }
                        this.blankdays = blankdaysArray;
                        this.no_of_days = daysArray;
                    },
                };
            }
        </script>