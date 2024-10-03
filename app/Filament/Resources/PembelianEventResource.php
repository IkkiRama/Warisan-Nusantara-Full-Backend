<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembelianEventResource\Pages;
use App\Filament\Resources\PembelianEventResource\RelationManagers;
use App\Models\PembelianEvent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PembelianEventResource extends Resource
{
    protected static ?string $model = PembelianEvent::class;

    protected static ?string $navigationIcon = 'heroicon-m-shopping-bag';

    protected static ?string $navigationGroup = 'Event';

    // protected static ?string $navigationLabel = 'Event';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_user')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jumlah_tiket')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jenis_tiket')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_pembelian')
                    ->required(),
                Forms\Components\TextInput::make('jenis_pembayaran')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('total_pembelian')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('status_pembelian')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_user')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_tiket')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_tiket')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_pembelian')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_pembayaran')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_pembelian')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_pembelian')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPembelianEvents::route('/'),
            'create' => Pages\CreatePembelianEvent::route('/create'),
            'edit' => Pages\EditPembelianEvent::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
