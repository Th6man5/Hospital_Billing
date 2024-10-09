 <nav class="fixed top-0 z-50 w-full bg bg-nav border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
     <div class="px-3 py-3 lg:px-5 lg:pl-3">
         <div class="flex items-center justify-between">
             <div class="flex items-center justify-start rtl:justify-end">
                 <a href="http://localhost/hospital_billing/src/main.php" class="flex ms-2 md:me-24">
                     <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-black">Hospital Admin</span>
                 </a>
             </div>
         </div>
     </div>
 </nav>

 <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg bg-sidenav border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
     <div class="h-full px-3 pb-4 overflow-y-auto bg bg-sidenav dark:bg-gray-800">
         <ul class="space-y-2 font-medium">
             <li>
                 <a href="http://localhost/hospital_billing/src/transaksi/transaksi.php" class="flex items-center p-2 text-gray-900 rounded-lg text-black hover:bg-black hover:text-white group">
                 <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-nav" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z"/></svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                 </a>
             </li>
             <li>
                 <a href="http://localhost/hospital_billing/src/dokter/dokter.php" class="flex items-center p-2 text-gray-900 rounded-lg text-black hover:bg-black hover:text-white group">
                     <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-nav" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                         <path d="M540-80q-108 0-184-76t-76-184v-23q-86-14-143-80.5T80-600v-240h120v-40h80v160h-80v-40h-40v160q0 66 47 113t113 47q66 0 113-47t47-113v-160h-40v40h-80v-160h80v40h120v240q0 90-57 156.5T360-363v23q0 75 52.5 127.5T540-160q75 0 127.5-52.5T720-340v-67q-35-12-57.5-43T640-520q0-50 35-85t85-35q50 0 85 35t35 85q0 39-22.5 70T800-407v67q0 108-76 184T540-80Zm220-400q17 0 28.5-11.5T800-520q0-17-11.5-28.5T760-560q-17 0-28.5 11.5T720-520q0 17 11.5 28.5T760-480Zm0-40Z" />
                     </svg>
                     <span class="ms-3">Dokter</span>
                 </a>
             </li>
             <li>
                 <a href="http://localhost/hospital_billing/src/pasien/pasien.php" class="flex items-center p-2 text-gray-900 rounded-lg text-black hover:bg-black hover:text-white group">
                     <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-nav" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                         <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Pasien</span>
                 </a>
             </li>
             <li>
                 <a href="http://localhost/hospital_billing/src/insuransi/insuransi.php" class="flex items-center p-2 text-gray-900 rounded-lg text-black hover:bg-black hover:text-white group">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-shaded flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-nav" viewBox="0 0 16 16">
                         <path fill-rule="evenodd" d="M8 14.933a1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Insuransi</span>
                 </a>
             </li>
             <li>
                 <a href="http://localhost/hospital_billing/src/transaksi/transaksi.php" class="flex items-center p-2 text-gray-900 rounded-lg text-black hover:bg-black hover:text-white group">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-nav" viewBox="0 0 16 16">
                         <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                         <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Transaksi</span>
                 </a>
             </li>
             <li>
                 <a href="http://localhost/hospital_billing/src/layanan/layanan.php" class="flex items-center p-2 text-gray-900 rounded-lg text-black hover:bg-black hover:text-white group">
                     <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-nav" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                         <path d="M160-80q-33 0-56.5-23.5T80-160v-480q0-33 23.5-56.5T160-720h160v-80q0-33 23.5-56.5T400-880h160q33 0 56.5 23.5T640-800v80h160q33 0 56.5 23.5T880-640v480q0 33-23.5 56.5T800-80H160Zm0-80h640v-480H160v480Zm240-560h160v-80H400v80ZM160-160v-480 480Zm280-200v120h80v-120h120v-80H520v-120h-80v120H320v80h120Z" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Daftar Layanan</span>
                 </a>
             </li>


         </ul>
     </div>
 </aside>