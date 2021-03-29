<?php


    namespace App\Http\Controllers;


    use App\Http\DataTables\Users\UsersDataTables;
    use App\Http\Requests\Usuarios\UsuarioRequestCreate;
    use App\Http\Requests\Usuarios\UsuarioRequestUpdate;
    use App\Models\User;
    use App\Services\UserService;
    use Exception;
    use Spatie\Permission\Models\Role;
    use Throwable;

    class UsuariosController extends Controller
    {
        /**
         * @var UserService
         */
        protected UserService $userService;
        /**
         * @var string
         */
        private string $titulo;

        /**
         * LougradourosController Constructor
         *
         * @param  UserService  $userService
         *
         */
        public function __construct(UserService $userService)
        {
            $this->userService = $userService;
            $this->titulo      = 'Usuários';
        }


        public function index(UsersDataTables $dataTable)
        {
            $page_title          = $this->titulo;
            $this->data['title'] = "Lista de Usuários";
            $this->data['new']   = route('usuarios.create');


            return $dataTable->render('template.datatables', compact('page_title'), ['data' => $this->data]);

        }

        public function create()
        {
            $model = new User();

            $page_title = $this->titulo;
            $roles      = Role::query()->pluck('name', 'name')->all();
            $userRole   = [];
            return view('pages.usuarios.show', compact('page_title', 'model', 'roles', 'userRole'));

        }

        public function show($id)
        {
            $model      = $this->userService->findById($id);
            $roles      = Role::query()->pluck('name', 'name')->all();
            $userRole   = $model->roles->pluck('name', 'name')->all();
            $page_title = $this->titulo;

            return view('pages.usuarios.show', compact('page_title', 'model', 'roles', 'userRole'));

        }

        public function store(UsuarioRequestCreate $request)
        {
            try {
                $this->userService->saveUser($request->validated());
            } catch (Exception $e) {
                return redirect()->route('users.create')->with('errors', $e->getMessage());
            }

            return redirect()->route('usuarios.index')->with('success', 'Registro cadastrado com sucesso');

        }

        public function update(UsuarioRequestUpdate $request, $id)
        {
            try {
                $this->userService->updateUser($request->validated(), $id);
            } catch (Exception $e) {
                return redirect()->route('usuarios.show', $id)->with('errors', $e->getMessage());
            } catch (Throwable $e) {
            }

            return redirect()->route('usuarios.index')->with('success', 'Registro atualizado com sucesso');
        }

        public function destroy($id)
        {
            try {
                $this->userService->deleteById($id);
                return redirect()->route('users.index')->with('success', 'Registro excluído com sucesso!!!');
            } catch (Exception $e) {
                return redirect()->route('users.index')->with('errors', 'Erro ao remover o registro');
            } catch (Throwable $e) {
            }
        }

    }
