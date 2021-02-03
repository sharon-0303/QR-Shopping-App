package com.example.shop;

import android.os.Bundle;
import android.preference.PreferenceManager;
import android.app.Activity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.SharedPreferences.Editor;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class IPsettings extends Activity {

	EditText ed;
	Button b;
	SharedPreferences sh;
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_ipsettings);
		
		ed=(EditText)findViewById(R.id.editText1);
		b=(Button)findViewById(R.id.button1);
		sh=PreferenceManager.getDefaultSharedPreferences(getApplicationContext());
		ed.setText(sh.getString("ip", ""));
		b.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				String ipadr=ed.getText().toString();
				Editor edt=sh.edit();
				edt.putString("ip", ipadr);
				edt.commit();
				Intent i=new Intent(getApplicationContext(), Login.class);
				startActivity(i);
			}
		});
	}
}
