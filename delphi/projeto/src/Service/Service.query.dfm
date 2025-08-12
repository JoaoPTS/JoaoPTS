object ServiceQuery: TServiceQuery
  Height = 840
  Width = 1120
  object QRY_user: TFDQuery
    AfterInsert = QRY_userAfterInsert
    Connection = ServiceConexao.FDConn
    SQL.Strings = (
      'select * from "USER"')
    Left = 155
    Top = 178
    object QRY_userID: TIntegerField
      FieldName = 'ID'
      Origin = 'ID'
      ProviderFlags = [pfInUpdate, pfInWhere, pfInKey]
      Required = True
    end
    object QRY_userNAME: TStringField
      FieldName = 'NAME'
      Origin = 'NAME'
      Size = 120
    end
    object QRY_userPASS: TStringField
      FieldName = 'PASS'
      Origin = 'PASS'
      Size = 50
    end
  end
  object QRY_userAUTOID: TFDQuery
    Connection = ServiceConexao.FDConn
    SQL.Strings = (
      'select gen_ID(autoincrement, 1) from RDB$DATABASE')
    Left = 275
    Top = 178
    object QRY_userAUTOIDGEN_ID: TLargeintField
      AutoGenerateValue = arDefault
      FieldName = 'GEN_ID'
      Origin = '"GEN_ID"'
      ProviderFlags = []
      ReadOnly = True
    end
  end
end
