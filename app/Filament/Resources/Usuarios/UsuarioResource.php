<?php
namespace App\Filament\Resources;

use App\Filament\Resources\UsuarioResource\Pages;
use App\Models\Usuario;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class UsuarioResource extends Resource
{
    protected static ?string $model = Usuario::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')->required(),
                Forms\Components\TextInput::make('apellido')->required(),
                Forms\Components\TextInput::make('correo')->email()->required(),
                Forms\Components\Select::make('tipo_usuario')
                    ->options([
                        'estudiante' => 'Estudiante',
                        'docente' => 'Docente',
                        'externo' => 'Externo',
                    ])->required(),
                Forms\Components\TextInput::make('carrera'),
                Forms\Components\TextInput::make('especialidad'),
                Forms\Components\TextInput::make('documento_id')->required(),
                Forms\Components\PasswordInput::make('contraseña')->required(),
                Forms\Components\Select::make('id_rol')
                    ->relationship('rol', 'nombre_rol')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('apellido')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('correo'),
                Tables\Columns\TextColumn::make('tipo_usuario'),
                Tables\Columns\TextColumn::make('rol.nombre_rol'),
            ])
            ->filters([
                // Ejemplo de filtros por rol o tipo_usuario si lo deseas
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Aquí se pueden agregar relaciones (Atenciones)
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsuarios::route('/'),
            'create' => Pages\CreateUsuario::route('/create'),
            'edit' => Pages\EditUsuario::route('/{record}/edit'),
        ];
    }
};

