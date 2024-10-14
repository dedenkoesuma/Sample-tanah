<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengambilanSampelResource\Pages;
use App\Filament\Resources\PengambilanSampelResource\RelationManagers;
use App\Models\SampelTanah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction as ActionsExportAction;
use Filament\Tables\Table;

class PengambilanSampelResource extends Resource
{
    protected static ?string $model = SampelTanah::class;
    protected static ?string $navigationLabel = 'Ambil Sampel';
    protected static ?string $label = 'Sampel';

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')
                    ->schema([
                        Forms\Components\Select::make('client_id')
                            ->label(__('Nama Client'))
                            ->relationship('client', 'name')
                            ->required(),
                        Forms\Components\TextInput::make('title')
                            ->label(__('Judul Sampel'))
                            ->required(),
                        Forms\Components\Select::make('type_id')
                            ->label(__('Jenis Sampel'))
                            ->relationship('type', 'name')
                            ->required(),
                        Forms\Components\TextInput::make('weight')
                            ->label(__('Berat Sampel'))
                            ->required()
                            ->numeric(),
                        Forms\Components\Select::make('unit_id')
                            ->label(__('Unit Satuan'))
                            ->relationship('unit', 'name')
                            ->required(),
                        Forms\Components\Select::make('objectivity_id')
                            ->label(__('Tujuan Uji'))
                            ->relationship('objectivity', 'name')
                            ->required(),
                        Forms\Components\FileUpload::make('images')
                            ->label(__('Gambar Sampel'))
                            ->multiple()
                            ->columnspan('full')
                            ->preserveFilenames()
                            ->image(),
                    ])->columns([
                        'lg' => '2',
                        'md' => '2',
                        'sm' => '1',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')
                ->label(__('No'))
                ->getStateUsing(function ($record, $rowLoop) {
                    return $rowLoop->iteration;
                }),
            Tables\Columns\TextColumn::make('created_at')
                ->label(__('Tanggal Input'))
                ->dateTime('d-m-Y')
                ->sortable(),
            Tables\Columns\TextColumn::make('client.name')
                ->label(__('Nama Client')),
            Tables\Columns\TextColumn::make('title')
                ->label(__('Judul Sampel')),
            Tables\Columns\TextColumn::make('type.name')
                ->label(__('Jenis Sampel')),
            Tables\Columns\TextColumn::make('weight')
                ->label(__('Berat Sampel')),
            Tables\Columns\TextColumn::make('unit.name')
                ->label(__('Unit Satuan')),
            Tables\Columns\TextColumn::make('objectivity.name')
                ->label(__('Tujuan Uji')),
            Tables\Columns\ImageColumn::make('images')
                ->label(__('Lampiran'))
                ->circular()
                ->stacked(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()
            ])
            ->headerActions([

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPengambilanSampels::route('/'),
            'create' => Pages\CreatePengambilanSampel::route('/create'),
            'edit' => Pages\EditPengambilanSampel::route('/{record}/edit'),
        ];
    }
}
