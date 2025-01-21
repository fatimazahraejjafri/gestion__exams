<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Professeur</title>
<style>
    /* Global styles */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
    }
    .dashboard {
      display: flex;
      min-height: 100vh;
    }
    /* Sidebar styles */
    .sidebar {
      width: 250px;
      background-color: #2c3e50;
      color: white;
      padding: 20px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }
    .sidebar h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .sidebar ul {
      list-style: none;
      padding: 0;
    }
    .sidebar ul li {
      margin: 10px 0;
    }
    .sidebar ul li a {
      color: white;
      text-decoration: none;
      padding: 10px;
      display: block;
      border-radius: 5px;
      transition: background-color 0.3s;
    }
    .sidebar ul li a:hover,
    .sidebar ul li a.active {
      background-color: #34495e;
    }
    /* Main content styles */
    .main-content {
      flex: 1;
      padding: 20px;
    }
    header {
      background-color: #e3a70f;
      color: white;
      padding: 20px;
      border-radius: 5px;
      margin-bottom: 20px;
    }
    header h1 {
      margin: 0;
    }
    header p {
      margin: 5px 0 0;
    }
    /* Form and table styles */
    form {
      margin-bottom: 20px;
    }
    form label {
      display: block;
      margin: 10px 0 5px;
    }
    form select,
    form button {
      padding: 10px;
      font-size: 16px;
      margin-bottom: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    form button {
      background-color: #007bff;
      color: white;
      border: none;
      cursor: pointer;
    }
    form button:disabled {
      background-color: #ccc;
      cursor: not-allowed;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    table th,
    table td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }
    table th {
      background-color: #f4f4f4;
    }
    .hidden {
      display: none;
    }
    #studentsContainer button{
      margin-top: 30px;
    }


  .action-btn {
    padding: 5px 10px;
    font-size: 14px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }
  .action-btn.en-cours {
    background-color: #f39c12;
    color: white;
  }
  .action-btn.accepter {
    background-color: #27ae60;
    color: white;
  }
  .action-btn.refuser {
    background-color: #e74c3c;
    color: white;
  }
  .action-btn:hover {
    opacity: 0.9;
  }
/* Table styles */
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
  background-color: #ffffff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  overflow: hidden;
}

table th,
table td {
  padding: 12px 15px;
  text-align: left;
  font-size: 14px;
}

table th {
  background-color: #f4f4f4;
  color: #333333;
  text-transform: uppercase;
  font-weight: 600;
  border-bottom: 2px solid #eaeaea;
}

table td {
  border-bottom: 1px solid #eaeaea;
  color: #555555;
}

table tbody tr:nth-child(odd) {
  background-color: #f9f9f9;
}

table tbody tr:hover {
  background-color: #f1f1f1;
  transition: background-color 0.2s ease-in-out;
}

table tbody tr:last-child td {
  border-bottom: none;
}

/* Sticky column for action buttons */
table tbody tr td:last-child {
  position: sticky;
  right: 0;
  background-color: #ffffff;
}

/* Action buttons in the last column */
.action-select {
  padding: 6px 10px;
  font-size: 14px;
  border: 1px solid #ddd;
  border-radius: 4px;
  background-color: #ffffff;
  color: #555555;
  cursor: pointer;
}

.action-select:focus {
  border-color: #007bff;
  outline: none;
}

.action-select option {
  font-size: 14px;
}

</style>
</head>
<body>
  <div class="dashboard">
    <!-- Sidebar -->
    <aside class="sidebar">
      <img src="<?= base_url('images/homme'); ?>" alt="Maroc Image" style="width: 50%; height: auto; display: block; margin: auto;" />
      <ul>
        <li><a href="#saisir-notes" class="active">Saisir des Notes</a></li>
        <li><a href="#mes-classes">Mes Classes</a></li>
        <li><a href="#statistiques">Statistiques</a></li>
        <li><a href="/login/logout">Déconnexion</a></li>
      </ul>
    </aside>
    <!-- Main Content -->
    <main class="main-content">
      <header>
          <h1>RECLAMATION DES ETUDIANT</h1>
        
      </header>
    
      <div class="relative font-inter antialiased">

<main class="relative min-h-screen flex flex-col justify-center bg-slate-50 overflow-hidden">
    <div class="w-full max-w-6xl mx-auto px-4 md:px-5 py-24">
        <div class="flex justify-center">

            <div class="w-full max-w-2xl bg-white shadow-xl rounded-2xl">
              
                <div class="p-3">

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <!-- Table header -->
                            <thead class="text-[13px] text-slate-500/70">
                                <tr>
                                    <th class="px-5 py-2 first:pl-3 last:pr-3 bg-slate-100 first:rounded-l last:rounded-r last:pl-5 last:sticky last:right-0">
                                        <div class="font-medium text-left">#</div>
                                    </th>                                        
                                    <th class="px-5 py-2 first:pl-3 last:pr-3 bg-slate-100 first:rounded-l last:rounded-r last:pl-5 last:sticky last:right-0">
                                        <div class="font-medium text-left">NOM ETUDIANT *</div>
                                    </th>
                                    <th class="px-5 py-2 first:pl-3 last:pr-3 bg-slate-100 first:rounded-l last:rounded-r last:pl-5 last:sticky last:right-0">
                                        <div class="font-medium text-left">PRENOM ETUDIANT *</div>
                                    </th>
                                    <th class="px-5 py-2 first:pl-3 last:pr-3 bg-slate-100 first:rounded-l last:rounded-r last:pl-5 last:sticky last:right-0">
                                        <div class="font-medium text-left">EMAIL *</div>
                                    </th>
                                    <th class="px-5 py-2 first:pl-3 last:pr-3 bg-slate-100 first:rounded-l last:rounded-r last:pl-5 last:sticky last:right-0">
                                        <div class="font-medium text-left">CNE *</div>
                                    </th>
                                    <th class="px-5 py-2 first:pl-3 last:pr-3 bg-slate-100 first:rounded-l last:rounded-r last:pl-5 last:sticky last:right-0">
                                        <div class="font-medium text-left">FILERE *</div>
                                    </th>
                                    <th class="px-5 py-2 first:pl-3 last:pr-3 bg-slate-100 first:rounded-l last:rounded-r last:pl-5 last:sticky last:right-0">
                                        <div class="font-medium text-left">MODULE *</div>
                                    </th>
                                    <th class="px-5 py-2 first:pl-3 last:pr-3 bg-slate-100 first:rounded-l last:rounded-r last:pl-5 last:sticky last:right-0">
                                        <div class="font-medium text-left">RECLAMATION *</div>
                                    </th>
                                    <th class="px-5 py-2 first:pl-3 last:pr-3 bg-slate-100 first:rounded-l last:rounded-r last:pl-5 last:sticky last:right-0">
                                        <div class="font-medium text-left sr-only">ETAT *</div>
                                    </th>                                        
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody class="text-sm font-medium">
                            <!-- Row -->
                                <tr>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                        <div class="text-slate-500">1</div>
                                    </td>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                        <div class="flex items-center">
                                            <svg class="shrink-0 mr-2 sm:mr-3" width="36" height="36" viewBox="0 0 36 36">
                                                <path fill="#fff" d="M24.563 16.236c.282-1.891-1.157-2.908-3.127-3.586l.64-2.562-1.56-.389-.622 2.495c-.41-.103-.831-.199-1.25-.294l.627-2.511L17.71 9l-.638 2.561c-.34-.077-.673-.153-.996-.234l.002-.008-2.15-.537-.416 1.666s1.157.265 1.133.281c.631.158.746.576.727.907l-.728 2.92c.044.01.1.026.162.051-.052-.013-.107-.027-.165-.04l-1.02 4.088c-.077.192-.273.48-.714.37.016.023-1.134-.282-1.134-.282L11 22.528l2.03.506c.377.095.747.194 1.112.287l-.646 2.591 1.558.389.639-2.564c.426.116.839.222 1.243.323l-.637 2.551 1.56.389.645-2.587c2.66.504 4.659.3 5.5-2.105.679-1.936-.033-3.053-1.432-3.782 1.019-.235 1.787-.905 1.991-2.29Zm-3.564 4.997c-.482 1.936-3.742.89-4.8.627l.857-3.433c1.057.264 4.447.786 3.943 2.806Zm.483-5.025c-.44 1.762-3.154.867-4.034.647l.776-3.113c.88.219 3.716.629 3.258 2.466Z"/>
                                            </svg>
                                            <div class="text-slate-900"></div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                        <div class="text-slate-500">Fati</div>
                                    </td>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                        <div class="text-slate-900">ja</div>
                                    </td>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                        <div class="text-slate-900"></div>nassima.etudiant@gmail.com
                                    </td>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                        <div class="text-emerald-500">M1......</div>
                                    </td>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                        <div class="text-emerald-500">IL</div>
                                    </td>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                        <div class="text-red-500">DT</div>
                                    </td>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                      <select class="action-select">
                                        <option value="en-cours" selected>En cours</option>
                                        <option value="accepter">Accepter</option>
                                        <option value="refuser">Refuser</option>
                                      </select>
                                    </td>

                                </tr>
                              
                                <tr>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                        <div class="text-slate-500">2</div>
                                    </td>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                        <div class="flex items-center">
                                            <svg class="shrink-0 mr-2 sm:mr-3" width="36" height="36" viewBox="0 0 36 36">
                                                <path fill="#fff" d="M24.563 16.236c.282-1.891-1.157-2.908-3.127-3.586l.64-2.562-1.56-.389-.622 2.495c-.41-.103-.831-.199-1.25-.294l.627-2.511L17.71 9l-.638 2.561c-.34-.077-.673-.153-.996-.234l.002-.008-2.15-.537-.416 1.666s1.157.265 1.133.281c.631.158.746.576.727.907l-.728 2.92c.044.01.1.026.162.051-.052-.013-.107-.027-.165-.04l-1.02 4.088c-.077.192-.273.48-.714.37.016.023-1.134-.282-1.134-.282L11 22.528l2.03.506c.377.095.747.194 1.112.287l-.646 2.591 1.558.389.639-2.564c.426.116.839.222 1.243.323l-.637 2.551 1.56.389.645-2.587c2.66.504 4.659.3 5.5-2.105.679-1.936-.033-3.053-1.432-3.782 1.019-.235 1.787-.905 1.991-2.29Zm-3.564 4.997c-.482 1.936-3.742.89-4.8.627l.857-3.433c1.057.264 4.447.786 3.943 2.806Zm.483-5.025c-.44 1.762-3.154.867-4.034.647l.776-3.113c.88.219 3.716.629 3.258 2.466Z"/>
                                            </svg>
                                            <div class="text-slate-900"></div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                        <div class="text-slate-500">Fati</div>
                                    </td>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                        <div class="text-slate-900">ja</div>
                                    </td>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                        <div class="text-slate-900"></div>nassima.etudiant@gmail.com
                                    </td>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                        <div class="text-emerald-500">M1......</div>
                                    </td>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                        <div class="text-emerald-500">IL</div>
                                    </td>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                        <div class="text-red-500">DT</div>
                                    </td>
                                    <td class="px-5 py-3 border-b border-slate-200 last:border-none first:pl-3 last:pr-3 last:bg-gradient-to-r last:from-transparent last:to-white last:to-[12px] last:pl-5 last:sticky last:right-0">
                                      <select class="action-select">
                                        <option value="en-cours" selected>En cours</option>
                                        <option value="accepter">Accepter</option>
                                        <option value="refuser">Refuser</option>
                                      </select>
                                    </td>

                                </tr>
                              
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</main>


    
    </div>
</div>

</div>

    </main>
  </div>

 
</body>
</html>
