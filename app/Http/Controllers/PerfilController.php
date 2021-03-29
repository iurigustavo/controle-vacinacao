<?php


    namespace App\Http\Controllers;


    use App\Http\DataTables\Users\UsersDataTables;
    use App\Http\Requests\Usuarios\ProfileRequestUpdate;
    use App\Http\Requests\Usuarios\UsuarioRequestCreate;
    use App\Http\Requests\Usuarios\UsuarioRequestUpdate;
    use App\Models\User;
    use App\Services\UserService;
    use Auth;
    use Exception;
    use Spatie\Permission\Models\Role;
    use Throwable;

    class PerfilController extends Controller
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


        public function show()
        {
            $model      = $this->userService->findById(Auth::id());
            $page_title = $this->titulo;

            return view('pages.perfil.show', compact('page_title', 'model'));

        }

        public function update(ProfileRequestUpdate $request)
        {
            try {
                $this->userService->updateProfile($request->validated(), Auth::id());
                Auth::user()->fresh();

            } catch (Exception $e) {
                return redirect()->route('perfil')->with('errors', $e->getMessage());
            } catch (Throwable $e) {
            }
            return redirect()->route('home')->with('success', 'Perfil atualizado com sucesso');
        }


    }
