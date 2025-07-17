<form action="" method="GET" class="flex items-center space-x-2">
    <input
        type="text"
        name="query"
        value="{{ request('query') }}"
        placeholder="Search location..."
        class="px-3 py-1.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm w-40 sm:w-64"
    >

    <select name="type" class="px-2 py-1.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
        <option value="">All</option>
        <option value="rent" {{ request('type') == 'rent' ? 'selected' : '' }}>Rent</option>
        <option value="sale" {{ request('type') == 'sale' ? 'selected' : '' }}>Sale</option>
    </select>

    <button type="submit" class="bg-blue-600 text-white px-3 py-1.5 rounded-md hover:bg-blue-700 text-sm">
        Search
    </button>
</form>
