<x-app-layout>
    <div class="container mx-auto">
        <div class="md:columns-2 sm:columns-1 border-dashed border-2 border-sky-200">
            <div>
                <div id="container" class="flex justify-center border-dashed border-2 border-sky-100">
                    <h1 class="mb-8 text-6xl font-extrabold">
                        <a href="{{ Route('segment.hometeam') }}">HOME</a>
                    </h1>
                </div>
                <div id="container" class="flex justify-center border-dashed border-2 border-sky-100">
                    <table id="home-game-board" class="border-separate"></table>
                </div>
                <div id="buttons" class="flex justify-start flex-row p-4 gap-8 border-dashed border-2 border-sky-100">
                    <p id="homeScore" class="hidden"></p>
                    <svg type="button" id="homeMinus1" xmlns="http://www.w3.org/2000/svg">
                        <circle r="27" cx="30" cy="30" fill="lightgray" stroke="black" stroke-width="2"
                            opacity="0.8" />
                        <text x="12" y="40"
                            style="
                                fill: pink;
                                font-weight: bold;
                                stroke: red;
                                stroke-width: 1;
                                font-size: xx-large;
                            ">
                            -1
                        </text>
                    </svg>
                    <svg type="button" id="homePlus1" xmlns="http://www.w3.org/2000/svg">
                        <circle r="27" cx="30" cy="30" fill="lightgray" stroke="black" stroke-width="2"
                            opacity="0.8" />
                        <text x="9" y="40"
                            style="
                                fill: greenyellow;
                                font-weight: bold;
                                stroke: green;
                                stroke-width: 1;
                                font-size: xx-large;
                            ">
                            +1
                        </text>
                    </svg>
                    <svg type="button" id="homePlus2" xmlns="http://www.w3.org/2000/svg">
                        <circle r="27" cx="30" cy="30" fill="lightgray" stroke="black" stroke-width="2"
                            opacity="0.8" />
                        <text x="8" y="40"
                            style="
                                fill: lightgreen;
                                font-weight: bold;
                                stroke: green;
                                stroke-width: 1;
                                font-size: xx-large;
                            ">
                            +2
                        </text>
                    </svg>
                    <svg type="button" id="homePlus3" xmlns="http://www.w3.org/2000/svg">
                        <circle r="27" cx="30" cy="30" fill="lightgray" stroke="black" stroke-width="2"
                            opacity="0.8" />
                        <text x="8" y="40"
                            style="
                                fill: green;
                                font-weight: bold;
                                stroke: green;
                                stroke-width: 1;
                                font-size: xx-large;
                            ">
                            +3
                        </text>
                    </svg>
                </div>
            </div>
            <div>
                <div id="container" class="flex justify-center border-dashed border-2 border-red-100">
                    <h1 class="mb-8 text-6xl font-extrabold">
                        <a href="{{ Route('segment.guestteam') }}">GUEST</a>
                    </h1>
                </div>
                <div id="container" class="flex justify-center border-dashed border-2 border-red-100">
                    <table id="away-game-board" class="border-separate"></table>
                </div>
                <div id="buttons" class="flex justify-end flex-row p-4 gap-8 border-dashed border-2 border-red-100">
                    <p id="awayScore" class="hidden"></p>
                    <svg type="button" id="awayMinus1" class="select-none" xmlns="http://www.w3.org/2000/svg">
                        <circle r="27" cx="30" cy="30" fill="lightgray" stroke="black" stroke-width="2"
                            opacity="0.8" />
                        <text x="12" y="40"
                            style="
                                fill: pink;
                                font-weight: bold;
                                stroke: red;
                                stroke-width: 1;
                                font-size: xx-large;
                            ">
                            -1
                        </text>
                    </svg>
                    <svg type="button" id="awayPlus1" xmlns="http://www.w3.org/2000/svg">
                        <circle r="27" cx="30" cy="30" fill="lightgray" stroke="black" stroke-width="2"
                            opacity="0.8" />
                        <text x="9" y="40"
                            style="
                                fill: greenyellow;
                                font-weight: bold;
                                stroke: green;
                                stroke-width: 1;
                                font-size: xx-large;
                            ">
                            +1
                        </text>
                    </svg>
                    <svg type="button" id="awayPlus2" xmlns="http://www.w3.org/2000/svg">
                        <circle r="27" cx="30" cy="30" fill="lightgray" stroke="black" stroke-width="2"
                            opacity="0.8" />
                        <text x="8" y="40"
                            style="
                                fill: lightgreen;
                                font-weight: bold;
                                stroke: green;
                                stroke-width: 1;
                                font-size: xx-large;
                            ">
                            +2
                        </text>
                    </svg>
                    <svg type="button" id="awayPlus3" xmlns="http://www.w3.org/2000/svg">
                        <circle r="27" cx="30" cy="30" fill="lightgray" stroke="black"
                            stroke-width="2" opacity="0.8" />
                        <text x="8" y="40"
                            style="
                                fill: green;
                                font-weight: bold;
                                stroke: green;
                                stroke-width: 1;
                                font-size: xx-large;
                            ">
                            +3
                        </text>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="{{ asset('js/app.js') }}"></script>
</x-app-layout>
