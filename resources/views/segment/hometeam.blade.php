<x-app-layout>
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 p-8">
            <div class="card bg-neutral shadow-lg rounded-md p-4">
                <h3 class="mb-8 text-xl font-bold text-center">
                    Team Information
                </h3>
                <table class="table table-zebra table-xs">
                    <thead class="text-white font-bold">
                        <tr>
                            <th scope="col" class="px-6 py-4">Number</th>
                            <th scope="col" class="px-6 py-4">
                                Player Name
                            </th>
                            <th scope="col" class="px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody id="teamInfo">
                        <!-- Team information will be displayed here -->
                    </tbody>
                </table>
            </div>

            <div class="card bg-neutral outline outline-offset-2 outline-[#ed8600] text-primary-content shadow-lg rounded-md p-4">
                <h3 class="mb-8 text-xl font-bold text-center">In Game</h3>
                <table class="table table-zebra table-xs">
                    <thead class="border-b text-white font-bold">
                        <tr>
                            <th scope="col" class="px-6 py-4">Number</th>
                            <th scope="col" class="px-6 py-4">
                                Player Name
                            </th>
                            <th scope="col" class="px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody id="inGameList">
                        <!-- In-game players will be displayed here -->
                    </tbody>
                </table>
            </div>

            <div class="card bg-neutral shadow-lg rounded-md p-4">
                <h3 class="mb-8 text-xl font-bold text-center">On Bench</h3>
                <table class="table table-zebra table-xs">
                    <thead class="border-b text-white font-bold">
                        <tr>
                            <th scope="col" class="px-6 py-4">Number</th>
                            <th scope="col" class="px-6 py-4">
                                Player Name
                            </th>
                            <th scope="col" class="px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody id="onBenchList">
                        <!-- Players on the bench will be displayed here -->
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex justify-center p-8">
            <button onclick="history.back()" class="btn btn-neutral m-4">
                <svg class="w-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <p>Go back</p>
            </button>
        </div>
    </div>
    <script type="module" src="{{ asset('js/hometeam.js') }}"></script>
</x-app-layout>
