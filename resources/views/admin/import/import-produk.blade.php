<button onclick="openModal()" class="flex items-center gap-2 rounded-lg bg-gradient-to-r from-cyan-500 to-cyan-700 hover:from-cyan-600 hover:to-cyan-800 text-white py-2 px-4 transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
    <x-mdi-database-import class="w-5 h-5" />
</button>
<div id="importModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="dark:bg-[#1f2937] w-full max-w-md rounded-lg shadow-lg">
        <!-- Header -->
        <div class="flex justify-between items-center px-4 py-3 border-b">
            <button onclick="closeModal()" class="">
                <x-gmdi-close class="w-6 h-6 text-gray-400 hover:text-gray-600"/>
            </button>
        </div>

        <!-- Body -->
        <form action="{{ route('admin.produk.import') }}" method="POST" enctype="multipart/form-data" class="px-4 py-6">
            @csrf
            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700 mb-1">Upload File</label>
                <input 
                    type="file" 
                    name="file" 
                    id="file" 
                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300 focus:border-blue-500"
                    accept=".xlsx,.xls,.csv" 
                    required
                >
            </div>
            <div class="text-sm text-gray-500 mb-4">
                Pastikan file sesuai dengan format template yang telah ditentukan.
                <a href="{{ route('admin.produk.download-template') }}" class="text-blue-500 hover:underline">
                    Unduh Template
                </a>
            </div>

            <!-- Footer -->
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    Import
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('importModal').classList.remove('hidden');
    }
    
    function closeModal() {
        document.getElementById('importModal').classList.add('hidden');
    }
</script>
