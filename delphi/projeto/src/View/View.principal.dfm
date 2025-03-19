object ViewPrincipal: TViewPrincipal
  Left = 0
  Top = 0
  BorderStyle = bsNone
  Caption = 'ViewPrincipal'
  ClientHeight = 926
  ClientWidth = 1453
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -12
  Font.Name = 'Segoe UI'
  Font.Style = []
  WindowState = wsMaximized
  TextHeight = 15
  object PHeader: TPanel
    Left = 0
    Top = 0
    Width = 1453
    Height = 105
    Align = alTop
    Alignment = taLeftJustify
    BevelOuter = bvNone
    Caption = 'Projeto de Cadastro de Banco de Dados'
    Color = clGrayText
    Font.Charset = DEFAULT_CHARSET
    Font.Color = clWindowText
    Font.Height = -61
    Font.Name = 'Segoe UI'
    Font.Style = [fsBold]
    ParentBackground = False
    ParentFont = False
    TabOrder = 0
    object BFechar: TButton
      Left = 1255
      Top = 0
      Width = 198
      Height = 105
      Align = alRight
      Caption = 'Fechar'
      Font.Charset = DEFAULT_CHARSET
      Font.Color = clWindowText
      Font.Height = -47
      Font.Name = 'Segoe UI'
      Font.Style = [fsBold]
      ParentFont = False
      TabOrder = 0
      OnClick = BFecharClick
      ExplicitLeft = 1252
      ExplicitTop = 3
      ExplicitHeight = 99
    end
  end
  object PButtons: TPanel
    Left = 0
    Top = 105
    Width = 257
    Height = 821
    Align = alLeft
    BevelOuter = bvNone
    Color = clGrayText
    ParentBackground = False
    TabOrder = 1
    object BUsuario: TButton
      Left = 0
      Top = 144
      Width = 257
      Height = 100
      Caption = 'Usu'#225'rios'
      Font.Charset = DEFAULT_CHARSET
      Font.Color = clWindowText
      Font.Height = -33
      Font.Name = 'Segoe UI'
      Font.Style = [fsBold]
      ParentFont = False
      TabOrder = 0
      OnClick = BUsuarioClick
    end
  end
end
