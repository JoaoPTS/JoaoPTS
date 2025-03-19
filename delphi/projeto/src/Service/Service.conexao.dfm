object ServiceConexao: TServiceConexao
  OnCreate = DataModuleCreate
  Height = 1470
  Width = 1960
  PixelsPerInch = 168
  object FDConn: TFDConnection
    Params.Strings = (
      'User_Name=SYSDBA'
      'Password=123456'
      'Protocol=TCPIP'
      'Server=Localhost'
      'CharacterSet=WIN1252'
      'Port=3050'
      'Database=C:\scripts\bd\PROJETO.FDB'
      'DriverID=FB')
    Connected = True
    Left = 576
    Top = 400
  end
  object WaitCursor: TFDGUIxWaitCursor
    Provider = 'Forms'
    Left = 952
    Top = 392
  end
  object FBDriverLink: TFDPhysFBDriverLink
    Left = 952
    Top = 504
  end
end
