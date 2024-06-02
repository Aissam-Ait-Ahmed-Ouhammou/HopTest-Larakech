    <!-- Modal -->
    <div id="showModal" class="modal modal-show fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-white w-11/12 mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <!-- Modal content -->
            <div class="modal-content text-left pt-6">
                <!-- Title -->
                <div class="flex justify-between items-center pb-3 px-6">
                    <p class="text-2xl font-bold">Detail du contact</p>
                    <button id="modal-close" class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                            height="18" viewBox="0 0 18 18">
                            <path
                                d="M15.82 3.82a1 1 0 00-1.41 0L9 7.59 4.59 3.18a1 1 0 00-1.41 1.41L7.59 9l-4.41 4.41a1 1 0 001.41 1.41L9 10.41l4.41 4.41a1 1 0 001.41-1.41L10.41 9l4.41-4.41a1 1 0 000-1.41z" />
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div>
                    <form>
                        @csrf
                        <!-- First Row -->
                        <div class="grid grid-cols-2 gap-4 mb-2 px-6">
                            <!-- Nom -->
                            <div>
                                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                                <input type="text" id="contact-prenom" name="prenom" disabled autocomplete="prenom"
                                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">

                            </div>
                            <!-- Prenom -->
                            <div>
                                <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                                <input type="text" id="contact-nom" name="nom" autocomplete="nom" disabled
                                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">

                            </div>
                        </div>
                        <!-- Second Row -->
                        <div class="mb-2 px-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                            <input type="email" id="contact-email" name="email" autocomplete="email" disabled
                                class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <!-- Second Row -->
                        <div class="mb-2 px-6">
                            <label for="entreprise" class="block text-sm font-medium text-gray-700">Entreprise</label>
                            <input type="text" id="contact-entreprise" name="entreprise" autocomplete="entreprise"
                                disabled
                                class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <!-- Third Row -->
                        <div class="mb-2 px-6">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <textarea id="contact-address" name="address" rows="2" disabled
                                class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>

                        <!-- Second Row -->
                        <!-- Third Row -->
                        <div class="grid grid-cols-3 gap-4 mb-2 px-6">
                            <!-- Zip Code -->
                            <div class="col-span-3 md:col-span-1">
                                <label for="zipcode" class="block text-sm font-medium text-gray-700">Zip Code</label>
                                <input type="number" id="contact-zipcode" name="zipcode" autocomplete="zipcode"
                                    disabled
                                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <!-- City -->
                            <div class="col-span-3 md:col-span-2">
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" id="contact-city" name="city" autocomplete="city" disabled
                                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>
                        <!-- First Row -->
                        <div class="grid grid-cols-2 gap-4 mb-4 px-6">
                            <!-- Nom -->
                            <div>
                                <label for="nom" class="block text-sm font-medium text-gray-700">Status</label>
                                <select id="contact-status" name="status" disabled
                                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="LEAD">Lead</option>
                                    <option value="CLIENT">Client</option>
                                    <option value="PROSPECT">Prospect</option>
                                </select>
                            </div>
                            <!-- Prenom -->
                        </div>

                        <div class="flex justify-end px-6 py-6" style="background: #eff5f5;">
                            <button type="button"
                                class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400 cancel mr-4">
                                Fermé </button>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>
